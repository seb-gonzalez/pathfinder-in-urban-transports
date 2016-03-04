
package clientewebservices_gijon;


import es.gijon.docs.sw.busgijon.*;
import es.gijon.docs.sw.busgijon.ParadasBus;
import es.gijon.docs.sw.busgijon.ParadasTrayectosBus;
import es.gijon.docs.sw.busgijon.PosicionesBus;
import es.gijon.docs.sw.busgijon.TrayectosBus;

import java.util.*;
import java.util.List;
import uk.me.jstoot.jcoord.UTMRef;
import java.sql.*;


public class Manejador
{
    private Adaptador adaptador;  
    private UTMRef conversor;
    private ConexionBD persistencia;

    
    /**CONSTRUCTOR
     */
    public Manejador() throws SQLException
    {
        conversor = new UTMRef();
        persistencia = new ConexionBD();
        adaptador = new Adaptador(persistencia);
    }
    
    
    /* Metodo: cerrarConexion()
     * Metodo que se encarga de cerrar la conexion con la BD
     */
    public void cerrarConexion() throws SQLException
    {
        if(this.persistencia != null) persistencia.close();
    }
    
    
  
   
   
    
    
    
    
  
    
    
    /**zonaDinamica
     * Metodo que se encarga de hacer persistir los elementos
     * variantes a lo largo del tiempo
     * 
     * -AUTOBUS
     * -LOCALIZACION
     * -CARRERA
     * 
     */
    public void zonaDinamica() throws SQLException
    {
        
        //AUTOBUS ###################
        List<PosicionBus> posiciones = posiciones().getPosicion();
        PosicionBus aux = null;
        //System.out.println("\n\n\tPosiciones: || Tam: "+posiciones.size());
        //System.out.println("\t-------\n");
        
        for(int i=0; i<posiciones.size(); i++)
        {
            aux = posiciones.get(i);
            conversor.setValores(aux.getUtmx(), aux.getUtmy(), 'N', 30);
          /*  System.out.println("\tidAutobus: "+aux.getIdautobus()
                    +"  Matricula: "+aux.getMatricula()+ "  Modelo: "+aux.getModelo()+"  idLinea: "+aux.getIdlinea()
                    +" idTrayecto: "+aux.getIdtrayecto()+"  idParada: "+aux.getIdparada()
                    +"OrdenParada: "+aux.getOrdenparada()+"  HoraAct: "+aux.getHoraactualizacion()
                    +"  FechaAct: "+aux.getFechaactualizacion()+"  idSiguienteParada: "+aux.getIdsiguienteparada()
                    +"   Minutos: "+aux.getMinutos()+"  Distancia: "+aux.getDistancia()+
                    " Localizacion("+conversor.toLatLng().getLat()+","+conversor.toLatLng().getLng()+")\n");
           */ 
            
            //************** BD AUTOBUS
            persistencia.IUD("INSERT IGNORE INTO AUTOBUS(idAutobus, Matricula, Modelo) "
                    + "values('"+aux.getIdautobus()+"','"+aux.getMatricula()+"','"+aux.getModelo()+"')");
            //************** BD AUTOBUS
            
            
            //LOCALIZACION ###################
            /*Cuando la 'idSiguienteParada' = 0. No me es posible insertar el valor
             * puesto que por integridad referencial.. en la tabla paradas no existe ningún
             * idParada = 0.  Asi que me veo en la obligación de no insertar localizaciones con paradas
             * siguientes a  0.  Lo mismo es aplicable a la tabla POSICIONVIVA.
             * Puedo comprobar que el id este entre [1 - 708] o que sea distinto de 0.
             */
            
            //Primero he de comprobar que la latitud > 0
          if(conversor.toLatLng().getLat() > 0 && aux.getIdsiguienteparada() != 0) //ya que puede salir -0.00000.0..2.3246565
          {
                persistencia.IUD("insert IGNORE  into LOCALIZACION(idAutobus, HoraActualizacion, FechaActualizacion,idSiguienteParada,Lat,Lng)"
                        + "values ('"+aux.getIdautobus()+"','"+aux.getHoraactualizacion()+"','"+aux.getFechaactualizacion()+"','"
                        +aux.getIdsiguienteparada()+"','"+conversor.toLatLng().getLat()+"','"+conversor.toLatLng().getLng()+"') " );
          
            //################################
            
            //POSICION VIVA! ###################
            
            persistencia.IUD("insert IGNORE into POSICIONVIVA(idAutobus, idLinea, idTrayecto, HoraActualizacion, FechaActualizacion,idSiguienteParada,Lat,Lng)"
                    + "values ('"+aux.getIdautobus()+"','"+aux.getIdlinea()+"','"+aux.getIdtrayecto()+"','"+aux.getHoraactualizacion()+"','"+aux.getFechaactualizacion()+"','"
                    +aux.getIdsiguienteparada()+"','"+conversor.toLatLng().getLat()+"','"+conversor.toLatLng().getLng()+"') ");
          }
            //################################
         
          //Aqui la criba la hago dentro del  WHERE
          //System.out.println("\nEl idsiguienteparada a meter en POSICIONVIVA es: "+aux.getIdsiguienteparada());
           String Actualizar = "UPDATE POSICIONVIVA SET FechaActualizacion='"+aux.getFechaactualizacion()+"' ,HoraActualizacion='"+aux.getHoraactualizacion()+"' , Lat='"+conversor.toLatLng().getLat()+"', Lng='"+conversor.toLatLng().getLng()+"' , idSiguienteParada='"+aux.getIdsiguienteparada()+"', idLinea = '"+aux.getIdlinea()+"', idTrayecto = '"+aux.getIdtrayecto()+"'"
            + "WHERE idAutobus='"+aux.getIdautobus()+"' AND  '"+conversor.toLatLng().getLat()+"' > 0 AND '"+aux.getIdsiguienteparada()+"' <> 0";  
           persistencia.IUD(Actualizar);
          //################################################################################################### CARRERAS
        
            
            if(posiciones.get(i).getIdautobus().toString() != null) //Esto no se si dejarlo puesto ya que en el momento de almacenar
                //puedo controlar que si el idautobus es nulo no lo ingrese.
            {
                

                List<EstadoParadasBus> estados =  estadoBus(posiciones.get(i).getIdautobus()).getParadas().getParada();
               // System.out.println("\nBUS: "+aux.getIdautobus());

                for(int j=0; j<estados.size(); j++)
                {
                 /*   System.out.println("\tidParada: "+estados.get(j).getIdparada()+"  idLinea: "+estados.get(j).getIdlinea()
                            +"  idTrayecto: "+estados.get(j).getIdtrayecto()+"  Minutos: "+estados.get(j).getMinutos()
                            +"  Distancia: "+estados.get(j).getDistancia()+"  HoraAct: "+estados.get(j).getHoraactualizacion()
                            +"  FechaAct: "+estados.get(j).getFechaactualizacion()+"\n");
                   */ 
                    
                    
                    //CARRERA #####################################################
                    persistencia.IUD("insert IGNORE into CARRERA (idAutobus, HoraActualizacion, FechaActualizacion, idParada, idLinea, idTrayecto, Minutos, Distancia) values ("
                            + "'"+aux.getIdautobus() +"','"+estados.get(j).getHoraactualizacion()+"','"+estados.get(j).getFechaactualizacion()+"',"
                            + "'"+estados.get(j).getIdparada()+"','"+estados.get(j).getIdlinea()+"','"+estados.get(j).getIdtrayecto()+"',"
                            + "'"+estados.get(j).getMinutos()+"','"+estados.get(j).getDistancia()+"')");
                    //CARRERA #####################################################
                    
                }
            
            }//FIN DEL IF QUE COMPRUEBA NULIDAD
            else System.out.println("\n\tEl autobus ha sido nulo!");
            
            
            //################################################################################################### CARRERAS
            
        }
        //###########################
        
        
       
        
        
    }
    
    
    
    /**zonaEstatica()
     * Metodo que se encarga de hacer persistir las clases que nunca variaran
     * 
     * -LINEAS
     * -PARADAS
     * -TRAYECTOS
     * -TRAMOS 
     * 
     */
    public void zonaEstatica() throws SQLException
    {
       
        
                
        //tipoLINEAS ###################
        persistencia.IUD("INSERT IGNORE INTO tipoLINEAS(idTipoLinea, Tipo) VALUES ('1','NORMAL')");
        persistencia.IUD("INSERT IGNORE INTO tipoLINEAS(idTipoLinea, Tipo) VALUES ('2','ESPECIAL')");
        //##############################        
        
        
        //LINEAS ###################
        List<LineaBus> linea = lineas().getLinea();       
        int tipo = 0;
        
        
        for(int i=0; i<linea.size(); i++)
        {           
            //************** BD
            
            if(linea.get(i).getTipo().equals("NORMAL")) tipo = 1;
            else tipo = 2;
            
            // IGNORE: se desechan las filas que duplican valores para claves únicas.
            persistencia.IUD("INSERT IGNORE INTO LINEAS (idLinea, idTipoLinea, Descripcion) values ('"
                    +linea.get(i).getIdlinea()+"','"+tipo+"','"
                    +linea.get(i).getDescripcion()+"')");
            //************** BD           
        }
        //##########################
        
        

        
        //PARADAS ##################
        List<ParadaBus> paradas = paradas().getParada();
        ParadaBus aux1 = null;
               
        for(int i=0; i<paradas.size(); i++)
        {
            aux1 = paradas.get(i);
            conversor.setValores(aux1.getUtmx(), aux1.getUtmy(), 'N', 30);
                     
            //************** BD
            persistencia.IUD("INSERT IGNORE INTO PARADAS (idParada, Descripcion, Lat, Lng) values ('"
                    +aux1.getIdparada()+"','"+aux1.getDescripcion()+"','"
                    +conversor.toLatLng().getLat()+"','"+conversor.toLatLng().getLng()+"')");
            //************** BD
            
            
            
        }
        //##########################
        
        //TRAYECTOS ################
        //El campo -idExtremos- ha de inicializarse
        //Será inicializo por el indice 'i+1' - empezara en 1
        //Hemos de eliminar de la descripcion el .. L-4 | B-8  ...etc como?
        //nombre  = nombre.substring(nombre.indexOf(".")+1);
        List<TrayectoBus> trayectos = trayectos().getTrayecto();
        TrayectoBus aux4 = null;
        String sentido = "";
        String descripcion_clean = "";
        String nombre = "";
        
        for(int i=0; i<trayectos.size(); i++)
        {
            aux4 = trayectos.get(i);
            sentido = this.adaptador.colocarSentido(aux4.getDireccion());
            nombre = aux4.getDescripcion();
            descripcion_clean = nombre.substring(nombre.indexOf(".")+1) ;
            //************** BD
            persistencia.IUD("INSERT IGNORE INTO TRAYECTOS (idTrayecto, idLinea, Descripcion, Sentido, idExtremos) values ('"
                    +aux4.getIdtrayecto()+"','"+aux4.getIdlinea()+"','"
                    +descripcion_clean+"','"+sentido+"', '"+(i+1)+"')");
            //************** BD            
            
        }
        //##########################
        
        
        
        //TRAMOS ###################
        List<ParadaTrayectoBus> paradatrayecto = paradasTrayectos().getParada(); 
        ParadaTrayectoBus aux2 = null;
        ResultSet devuelto  = null;
        int valor = 0;
        
        for(int i=0; i<paradatrayecto.size(); i++)
        {
            aux2 = paradatrayecto.get(i);
            
            //Esto me devolverá el número de columnas....
           
           
            devuelto = persistencia.selectQuery("select * from `lineas` where exists(select `Descripcion` from `lineas` WHERE `idLinea` = "+aux2.getIdlinea()+")");
            devuelto.last();
            valor = devuelto.getRow();
            if(valor != 0)
            {
            //************** BD
            persistencia.IUD("INSERT IGNORE INTO TRAMOS (idParada, idLinea, idTrayecto, Orden, Descripcion) values ('"
                    +aux2.getIdparada()+"','"+aux2.getIdlinea()+"','"
                    +aux2.getIdtrayecto()+"','"+aux2.getOrden()+"','"+aux2.getDescripcion()+"')");
            //************** BD   
            }
            
        }
    
        //##########################     

        //Metodo que se encarga de colocar los extremos pertenecientes a TRAYECTOS
        
        adaptador.colocarExtremos();
       
             
    }
    
    
    
    
    /* - capturaExcepcion() -
     * Metodo encargado de registrar la excepcion capturada en el programa 
     * principal. Este registro tiene cabida en una tabla destinada a tal fin
     * en la base de datos.
     * 
     * Registrando:
     * -Fecha
     * -Hora
     * -Tipo de fallo
     * -Descripcion
     * 
     */
    public void capturaExcepcion(Exception e)
    {
        
         
        //Tipo de la excepcion  
        String tipo = e.toString().substring(0, e.toString().indexOf(":"));       
         
         
         java.util.Date utilDate = new java.util.Date(); //fecha actual
         long lnMilisegundos = utilDate.getTime();
         java.sql.Date sqlDate = new java.sql.Date(lnMilisegundos);
         java.sql.Time sqlTime = new java.sql.Time(lnMilisegundos);     

         
         
         
         System.out.println("\n\tFecha: "+sqlDate+"  Hora: "+sqlTime);
         System.out.println("\n\t- Excepcion capturada -");
         System.out.println("\n\tTipo: "+tipo);
         System.out.println("\n\tMensaje: "+e.getMessage());
        
         
         try
         {
             persistencia.IUD("INSERT INTO EXCEPCIONES(Fecha, Hora, Tipo, Descripcion) VALUES "
                 + "('"+sqlDate+"','"+sqlTime+"','"+tipo+"','"+e.getMessage()+"')");
         }
         catch(SQLException ex)
         {
             System.out.println("\n\tHa ocurrido una excepción al insertar en tabla - EXCEPCIONES: ");
             System.out.println("\n\tMensaje: \n\t"+ex.toString());
             
         }
         
         
         
        
        
    }
    
    
    
    /*Metodo de prueba que Muestra y hace inserciones.
     * Metodo para depurar....
     * 
     */
    public void Mostrar() throws SQLException
    {
        
        
        List<HoraBus> horario = horarios().getHorario();
        System.out.println("\n\n\tHorarios: || Tam: "+horario.size());
        System.out.println("\t--------\n");
        System.out.println("\t-FechaInicio-             -FechaFin-               -Hora-      -idLinea-       -idTrayecto-        -NumeroExpedicion-");
        System.out.println ("\t-------------             ----------               ------      ---------       ------------        ------------------");
        
          
        
        for(int i=0; i<horario.size(); i++)
        {
            System.out.println("\t"+horario.get(i).getFechainicio()+"      "+horario.get(i).getFechafin()+
                    "       "+horario.get(i).getHora()+"          "+horario.get(i).getIdlinea()+"                   "+horario.get(i).getIdtrayecto()
                    +"                     "+horario.get(i).getNumeroexpedicion());
        }
        //################################################################################################
        
        
        List<LineaBus> linea = lineas().getLinea();
        System.out.println("\n\n\tLineas: || Tam: "+linea.size());
        System.out.println("\t-------\n");
        
        
        
        
        for(int i=0; i<linea.size(); i++)
        {
            System.out.println("\tidLinea: "+linea.get(i).getIdlinea()+"   Tipo: "+linea.get(i).getTipo()+
                    "   Descripcion: "+linea.get(i).getDescripcion());
            
            
            //************** BD
            // IGNORE: se desechan las filas que duplican valores para claves únicas.
            persistencia.IUD("insert IGNORE into LINEAS (idLinea, Tipo, Descripcion) values ('"
                    +linea.get(i).getIdlinea()+"','"+linea.get(i).getTipo()+"','"
                    +linea.get(i).getDescripcion()+"')");
            //************** BD
            
            
        }
        //################################################################################################
        
        List<LlegadaBus> llegadas = llegadasParadas().getLlegada();
        LlegadaBus aux = null;
        System.out.println("\n\n\tLlegadasParadas: || Tam: "+llegadas.size());
        System.out.println("\t-------\n");
        
        
        for(int i=0; i<llegadas.size(); i++)
        {
            aux = llegadas.get(i);
            System.out.println("\tidAutobus: "+aux.getIdautobus()+"  Matricula: "+aux.getMatricula()+"  Modelo: "+aux.getModelo()+"  idLinea: "+aux.getIdlinea()
                    +"  idTrayecto: "+aux.getIdtrayecto()+"  idParada: "+aux.getIdparada()+"  Minutos: "+aux.getMinutos()+"  Distancia: "+aux.getDistancia()
                    +"  HoraActualizacion: "+aux.getHoraactualizacion()+"  FechaActualizacion: "+aux.getFechaactualizacion());
        }
        //################################################################################################
        
        
        
        List<ParadaBus> paradas = paradas().getParada();
        ParadaBus aux1 = null;
        System.out.println("\n\n\tParadas: || Tam: "+paradas.size());
        System.out.println("\t-------\n");
        
        
        for(int i=0; i<paradas.size(); i++)
        {
            aux1 = paradas.get(i);
            conversor.setValores(aux1.getUtmx(), aux1.getUtmy(), 'N', 30);
            System.out.println("\tidParada: "+aux1.getIdparada()+"  Localizacion("+conversor.toLatLng().getLat()+", "+
                     conversor.toLatLng().getLng()+")    Descripcion: "+aux1.getDescripcion());
            
            
            
            //************** BD
            persistencia.IUD("insert IGNORE into PARADAS (idParada, Descripcion, Lat, Lng) values ('"
                    +aux1.getIdparada()+"','"+aux1.getDescripcion()+"','"
                    +conversor.toLatLng().getLat()+"','"+conversor.toLatLng().getLng()+"')");
            //************** BD
            
            
            
        }
       //################################################################################################ 
        
        
        //################################################################################################
        
         List<TrayectoBus> trayectos = trayectos().getTrayecto();
        TrayectoBus aux4 = null;
        System.out.println("\n\n\tTrayectos: || Tam: "+trayectos.size());
        System.out.println("\t-------\n");
        
        for(int i=0; i<trayectos.size(); i++)
        {
            aux4 = trayectos.get(i);
            System.out.println("\tidTrayecto: "+aux4.getIdtrayecto()+"  idLinea: "+aux4.getIdlinea()
                    +"  idCabecera: "+aux4.getIdcabecera()+"  Direccion: "+aux4.getDireccion()
                    +"  Destino: "+aux4.getDestino()+"  Descripcion: "+aux4.getDescripcion());
            
            
            
            //************** BD
            persistencia.IUD("insert IGNORE into TRAYECTOS (idTrayecto, idLinea, Descripcion, Direccion, Destino) values ('"
                    +aux4.getIdtrayecto()+"','"+aux4.getIdlinea()+"','"
                    +aux4.getDescripcion()+"','"+aux4.getDireccion()+"','"+aux4.getDestino()+"')");
            //************** BD
            
            
        }
        
        //################################################################################################
        
        
        
        //################################################################################################
        
        
        List<ParadaTrayectoBus> paradatrayecto = paradasTrayectos().getParada(); 
        ParadaTrayectoBus aux2 = null;
        System.out.println("\n\n\tParadasTrayectos: || Tam: "+paradatrayecto.size());
        System.out.println("\t-------\n");
        
        for(int i=0; i<paradatrayecto.size(); i++)
        {
            aux2 = paradatrayecto.get(i);
            conversor.setValores(aux2.getUtmx(), aux2.getUtmy(), 'N', 30);
            System.out.println("\tidParada: "+aux2.getIdparada()+"  idLinea: "+aux2.getIdlinea()+"  idTrayecto: "+aux2.getIdtrayecto()
                    +"  Orden: "+aux2.getOrden()+"  Descripcion: "+aux2.getDescripcion()
                            +"Localizacion("+conversor.toLatLng().getLat()+","+conversor.toLatLng().getLng()+")" );
            //************** BD
            persistencia.IUD("insert IGNORE into TRAMOS (idParada, idLinea, idTrayecto, Orden, Descripcion, Lat, Lng) values ('"
                    +aux2.getIdparada()+"','"+aux2.getIdlinea()+"','"
                    +aux2.getIdtrayecto()+"','"+aux2.getOrden()+"','"+aux2.getDescripcion()+"','"
                    +conversor.toLatLng().getLat()+"','"+conversor.toLatLng().getLng()+"')");
            //************** BD   
            
        }
    
        //################################################################################################
        
        List<PosicionBus> posiciones = posiciones().getPosicion();
        PosicionBus aux3 = null;
        System.out.println("\n\n\tPosiciones: || Tam: "+posiciones.size());
        System.out.println("\t-------\n");
        
        for(int i=0; i<posiciones.size(); i++)
        {
            aux3 = posiciones.get(i);
            conversor.setValores(aux3.getUtmx(), aux3.getUtmy(), 'N', 30);
            System.out.println("\tidAutobus: "+aux3.getIdautobus()
                    +"  Matricula: "+aux3.getMatricula()+ "  Modelo: "+aux3.getModelo()+"  idLinea: "+aux3.getIdlinea()
                    +" idTrayecto: "+aux3.getIdtrayecto()+"  idParada: "+aux3.getIdparada()
                    +"OrdenParada: "+aux3.getOrdenparada()+"  HoraAct: "+aux3.getHoraactualizacion()
                    +"  FechaAct: "+aux3.getFechaactualizacion()+"  idSiguienteParada: "+aux3.getIdsiguienteparada()
                    +"   Minutos: "+aux3.getMinutos()+"  Distancia: "+aux3.getDistancia()+
                    " Localizacion("+conversor.toLatLng().getLat()+","+conversor.toLatLng().getLng()+")\n");
            
            
            //************** BD
            persistencia.IUD("insert IGNORE into LOCALIZACION (idAutobus, "
                    + "idSiguienteParada, Lat, Lng) values ('"+Integer.parseInt( aux3.getIdautobus() ) +"','"+aux3.getIdsiguienteparada()+"','"
                    +conversor.toLatLng().getLat()+"','"+conversor.toLatLng().getLng()+"')");
            //************** BD  
            
            
        }
        
        
         
         //************** BD
     /*       persistencia.IUD("insert IGNORE into AUTOBUS (idAutobus, Matricula, Modelo) values ('"
                    + Integer.parseInt(aux3.getIdautobus())+"','"+aux3.getMatricula()+"','"
                    +aux3.getModelo()+"')");
       */     //************** BD   
        
        //################################################################################################
        
       
        //################################################################################################
        
        
        System.out.println("\n\n\tEstadoBus: || 296 || Arroja todas las paradas por las que ha de pasar dicho Bus");
        System.out.println("\t-------\n");
        
        
        System.out.println("\nTomo todos los autobuses que me da POSICIONES y veo por donde andan.");
        
        for(int j=0; j<posiciones.size(); j++)
        {
            
            
            
            //COMPRUEBO QUE EL BUS NO SEA NULO..
            
            if(posiciones.get(j).getIdautobus().toString() != null) //Esto no se si dejarlo puesto ya que en el momento de almacenar
                //puedo controlar que si el idautobus es nulo no lo ingrese.
            {
                    conversor.setValores(estadoBus(posiciones.get(j).getIdautobus()).getUtmx(), estadoBus(posiciones.get(j).getIdautobus()).getUtmy(), 'N', 30);

                System.out.println("\tidAutobus: "+estadoBus(posiciones.get(j).getIdautobus()).getIdautobus()+"  HoraAct: "+estadoBus(posiciones.get(j).getIdautobus()).getHoraactualizacion()
                        +"  FechaAct: "+estadoBus(posiciones.get(j).getIdautobus()).getFechaactualizacion()+"  Localizacion("+conversor.toLatLng().getLat()+","
                        +conversor.toLatLng().getLng()+")");

                List<EstadoParadasBus> estados =  estadoBus(posiciones.get(j).getIdautobus()).getParadas().getParada();


                for(int i=0; i<estados.size(); i++)
                {
                    System.out.println("\tidParada: "+estados.get(i).getIdparada()+"  idLinea: "+estados.get(i).getIdlinea()
                            +"  idTrayecto: "+estados.get(i).getIdtrayecto()+"  Minutos: "+estados.get(i).getMinutos()
                            +"  Distancia: "+estados.get(i).getDistancia()+"  HoraAct: "+estados.get(i).getHoraactualizacion()
                            +"  FechaAct: "+estados.get(i).getFechaactualizacion()+"\n");
                }
            
            }//FIN DEL IF QUE COMPRUEBA NULIDAD
            else System.out.println("\n\tEl autobus ha sido nulo!");
            
        }
        
        
     
        //################################################################################################
        
        System.out.println("\n\n\tEstadoLinea: || las 32!! || Arroja los trayectos que posee dicha linea, ademas"
                + "de los buses de dicha linea");
        System.out.println("\t--------------\n");
        int id;
        for(int l=0; l<linea.size(); l++)
        {
            id = linea.get(l).getIdlinea();
            System.out.println("\nidLinea: "+id);
           
            if(estadoLinea(id).getTrayectos() == null)
            ;
            else
            {   
                List<TrayectoLineaBus> estadolinea = estadoLinea(id).getTrayectos().getTrayecto();
                    for(int i=0; i<estadolinea.size(); i++)
                    {
                        System.out.println("\nidTrayecto: "+estadolinea.get(i).getIdtrayecto());
                        System.out.println("\tBuses que contiene dicha linea.....");
                        
                       if(estadolinea.get(i).getAutobuses() != null)
                       { List<AutobusTrayectoBus> buses = estadolinea.get(i).getAutobuses().getAutobus();
                        
                       
                            for(int j=0; j<buses.size(); j++)
                            {
                                
                                //AQUI PUEDO OBTENER MÁS DATOS DEL BUS EN CUESTIÓN
                                
                                 if(buses.get(j).getParadas().getParada() != null)                                                
                                 { 
                                     System.out.println("\tidAutobus: "+buses.get(j).getIdautobus());
                                     List<ParadaAutobusTrayectoBus> buseando = buses.get(j).getParadas().getParada();

                                         for(int k=0; k<buseando.size(); k++)
                                        {
                                            System.out.println("\t idParada: "+buseando.get(k).getIdparada()
                                                    +" Minutos: "+buseando.get(k).getMinutos()
                                                    +" Distancia: "+buseando.get(k).getDistancia()
                                                    +" HoraAct: "+buseando.get(k).getHoraactualizacion());
                                        }
                                        System.out.println("\n");
                                 }

                            }
                       }
                     }
            
            }
        
        }
        
        
        //################################################################################################
        
        System.out.println("\n\n\tEstadoParada: || 708 || Arroja los buses que se aproximan a la parada");
        System.out.println("\t----------------\n");
        
    for(int j=0; j<paradas.size(); j++)    
    {    
        List<AutobusBus>  busaprox = estadoParada(paradas.get(j).getIdparada()).getAutobus();
        
        if(busaprox.size() != 0)
        System.out.println("\n\tPARADA: "+paradas.get(j).getDescripcion()+"  indice: "+(j+1));    
            
            
        for(int i=0; i<busaprox.size(); i++)
        {
            conversor.setValores(busaprox.get(i).getUtmx(), busaprox.get(i).getUtmy(), 'N', 30);
            System.out.println("\n idAutobus: "+busaprox.get(i).getIdautobus()+ "  Minutos: "+busaprox.get(i).getMinutos()
                    +"  Localizacion("+conversor.toLatLng().getLat()+","+conversor.toLatLng().getLng()+")");
            
        }
        
    } 
        
    } // FIN METODO MOSTRAR
    
    
    
    
    
    //  WEB SERVICES ###########################################################################    
    /*Metodos directos del web service     */
    
    private static HorariosBus horarios() {
        es.gijon.docs.sw.busgijon.BusGijon service = new es.gijon.docs.sw.busgijon.BusGijon();
        es.gijon.docs.sw.busgijon.BusGijonSoap port = service.getBusGijonSoap();
        return port.horarios();
    }

    private static LineasBus lineas() {
        es.gijon.docs.sw.busgijon.BusGijon service = new es.gijon.docs.sw.busgijon.BusGijon();
        es.gijon.docs.sw.busgijon.BusGijonSoap port = service.getBusGijonSoap();
        return port.lineas();
    }

    private static LlegadasBus llegadasParadas() {
        es.gijon.docs.sw.busgijon.BusGijon service = new es.gijon.docs.sw.busgijon.BusGijon();
        es.gijon.docs.sw.busgijon.BusGijonSoap port = service.getBusGijonSoap();
        return port.llegadasParadas();
    }

    private static ParadasBus paradas() {
        es.gijon.docs.sw.busgijon.BusGijon service = new es.gijon.docs.sw.busgijon.BusGijon();
        es.gijon.docs.sw.busgijon.BusGijonSoap port = service.getBusGijonSoap();
        return port.paradas();
    }

    private static ParadasTrayectosBus paradasTrayectos() {
        es.gijon.docs.sw.busgijon.BusGijon service = new es.gijon.docs.sw.busgijon.BusGijon();
        es.gijon.docs.sw.busgijon.BusGijonSoap port = service.getBusGijonSoap();
        return port.paradasTrayectos();
    }

    private static PosicionesBus posiciones() {
        es.gijon.docs.sw.busgijon.BusGijon service = new es.gijon.docs.sw.busgijon.BusGijon();
        es.gijon.docs.sw.busgijon.BusGijonSoap port = service.getBusGijonSoap();
        return port.posiciones();
    }

    private static TrayectosBus trayectos() {
        es.gijon.docs.sw.busgijon.BusGijon service = new es.gijon.docs.sw.busgijon.BusGijon();
        es.gijon.docs.sw.busgijon.BusGijonSoap port = service.getBusGijonSoap();
        return port.trayectos();
    }

    private static EstadoAutobusBus estadoBus(java.lang.String psIdBus) {
        es.gijon.docs.sw.busgijon.BusGijon service = new es.gijon.docs.sw.busgijon.BusGijon();
        es.gijon.docs.sw.busgijon.BusGijonSoap port = service.getBusGijonSoap();
        return port.estadoBus(psIdBus);
    }

    private static EstadoLineaBus estadoLinea(int piIdLinea) {
        es.gijon.docs.sw.busgijon.BusGijon service = new es.gijon.docs.sw.busgijon.BusGijon();
        es.gijon.docs.sw.busgijon.BusGijonSoap port = service.getBusGijonSoap();
        return port.estadoLinea(piIdLinea);
    }

    private static EstadoParadaBus estadoParada(int piIdParada) {
        es.gijon.docs.sw.busgijon.BusGijon service = new es.gijon.docs.sw.busgijon.BusGijon();
        es.gijon.docs.sw.busgijon.BusGijonSoap port = service.getBusGijonSoap();
        return port.estadoParada(piIdParada);
    }
    
    
    //  WEB SERVICES ###########################################################################
    
    
    
    
}
