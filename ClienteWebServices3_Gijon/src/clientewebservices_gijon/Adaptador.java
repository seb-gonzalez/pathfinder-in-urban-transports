
package clientewebservices_gijon;


import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;


/*Clase dedicada a la adaptación de los datos del web service
 * a los requerimientos impuestos para nuestro almacenamiento.
 * 
 * Ejem:
 * 1. Cambiar la forma abreviada de algunas paradas a la forma completa.
 * 2. Cambiar 1/2 por ida/vuelta
 * 
 */
public class Adaptador 
{
    private ConexionBD persistencia;
    private ResultSet datos;

        
    public Adaptador(ConexionBD persistir)
    {
        this.persistencia = persistir;        
    }
    
    
    /*- colocarExtremos() -
     * Funcion que coloca los extremos - origen, destino - 
     * en la tabla trayectos. Todo esto conseguido a partir
     * de TRAMOS.
     * 
     * Tablas TRAYECTOS - beneficiaria de lo aqui conseguido
     * 
     * 1. Vemos la cantidad de trayectos existentes con sus 'idLinea' e 'idTrayecto' por cada uno
     * 2. Dentro de TRAMOS por cada 'idLinea' e 'idTrayecto' obtenemos una serie paradas que componen 
     * dicho TRAYECTO.  Por tanto tomamos la primera parada - ORIGEN, y la ultima - DESTINO.
     * 3. Con Origen y Destino nos vamos a la tabla EXTREMOS y vamos almacenandolos.
     */
    public void colocarExtremos() throws SQLException
    {
        String idLinea, idTrayecto;
        int N;
        String Origen, Destino;
        
        
        datos = persistencia.selectQuery("SELECT * FROM `TRAYECTOS`");
        
if(datos!=null)
{
        
        
        
        datos.last();
        int tamaño = datos.getRow();
        datos.beforeFirst();
        
        ArrayList<ArrayList<Integer>> lista = new ArrayList<ArrayList<Integer>>();      
        ArrayList<Integer> sublista ;
        //select * from tramos where idtrayecto=1 and  idlinea=1 order by orden;
        
        ArrayList<ArrayList<String>> cadenas = new ArrayList<ArrayList<String>>();
        ArrayList<String> subcadenas;
        
        while(datos.next())
        {
            
            //System.out.println("\nPANTALLAZO: idTrayecto: "+datos.getString("idTrayecto") +" idLinea: "+datos.getString("idLinea"));
            
            sublista = new ArrayList<Integer>();
            sublista.add(datos.getInt("idTrayecto"));
            sublista.add(datos.getInt("idLinea"));
            sublista.add(datos.getInt("idExtremos")); //Mantengo el identificador de la tabla extremos
            
            lista.add(sublista);
        }
        
       // System.out.println("\n\t listado: "+lista.toString());
       
        int n;
        ResultSet devuelto = null;
        int valor = 0;
        int joder = 0;
      try{  
        for(int i=0; i<tamaño; i++)
        { 
        
       joder = lista.get(i).get(1);
        
            subcadenas = new ArrayList<String>();
            
            
           devuelto =  persistencia.selectQuery("select * from `lineas` where exists(select `Descripcion` from `lineas` WHERE `idLinea` = "+lista.get(i).get(1)+")");
           devuelto.last();
           valor = devuelto.getRow(); 
           
           if(valor!=0)
           {
            
            datos = persistencia.selectQuery("SELECT * FROM `TRAMOS` where idTrayecto='"+lista.get(i).get(0) +"' and"
                    + " idLinea='"+lista.get(i).get(1) +"' ORDER BY Orden");
         
            
            datos.last();
            n = datos.getInt("Orden");            
            
          
            datos = persistencia.selectQuery("SELECT * FROM `TRAMOS` where idTrayecto='"+lista.get(i).get(0) +"' and"
                    + " idLinea='"+lista.get(i).get(1) +"' and Orden=0");
            
            datos.next();
            subcadenas.add(datos.getString("idParada"));
            
            datos = persistencia.selectQuery("SELECT * FROM `TRAMOS` where idTrayecto='"+lista.get(i).get(0) +"' and"
                    + " idLinea='"+lista.get(i).get(1) +"' and Orden='"+(n)+"'");
            
            datos.next();
            subcadenas.add(datos.getString("idParada"));
            
            
            //PUEDO INSERTAR DIRECTAMENTE YA!
            persistencia.IUD("INSERT IGNORE INTO `EXTREMOS`(idExtremos, idOrigenParada, idDestinoParada ) VALUES ('"+lista.get(i).get(2) +"','"+subcadenas.get(0) +"','"+subcadenas.get(1) +"') ");
            //###############################
            
            cadenas.add(subcadenas);
            
           }
        }
      }catch(Exception e)
      {
          System.out.println("valor de IdLinea: "+joder);
      }
        
}//Fin de la comprobación de nulidad del RESULTSET.     
       // System.out.println("\nEMPAREJAMIENTO: "+cadenas.toString());
        
        
        //Aqui a continuacion he de hacer las inserciones!!!!!!!!!!
       //persistencia.IUD("UPDATE TRAYECTOS SET Origen='"+Origen+"', Destino='"+Destino+"' WHERE idTrayecto='"++"' and idLinea='"++"'");
       
        
          
    }
    
    
    /*- colocarSentido -
     *Funcion que sirve para modificar el sentido numerica y transcribirlo
     * a algo entendible.
     * 
     * Tabla TRAYECTOS - beneficiaria de lo que produce este metodo
     */
    public String colocarSentido(int sentido)
    {
        String resultado = "";
        
        if(sentido == 1)
        {
            resultado = "Ida";
        }
        else
        {
            resultado = "Vuelta";
        }
        
        return resultado;
    }
    
    
    
    
}
