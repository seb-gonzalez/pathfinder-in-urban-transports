
package grafo;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.*;
import uk.me.jstoot.jcoord.*;


public class Manejador 
{
    private ConexionBD persistencia;
    ResultSet datos;
    
    /**CONSTRUCTOR
     */
    public Manejador() throws SQLException
    {
        this.persistencia = new ConexionBD();
    }
    
    
    
    
    /**getMontarAristas(int idLinea, idTrayecto)
     * 
     * Metodo que devuelve las aristas creadas en función de la linea y trayecto proporcionados.
     */
    private ArrayList<Arista> getMontarAristas(int idLinea, int idTrayecto) throws SQLException
    {
        ArrayList<Arista> resultado = new ArrayList<Arista>();
        int tam = 0;
        String Descripcion = ""; //Contendra "Nombre linea | nombre trayecto"
        
        //MATERIAL...................................................
        ArrayList<Vertice> lista_vertices = new ArrayList<Vertice>();
        //-----------------------------------------------------------
        
        
        //1 - CONSULTA A LA BD
        //Realizamos la consulta
        datos =  persistencia.selectQuery("select b.idParada, b.Descripcion, b.Lat, b.Lng from `TRAMOS` a INNER JOIN `PARADAS` b USING(idParada)"
               + "where idlinea='"+idLinea+"' and idtrayecto='"+idTrayecto+"' ORDER BY Orden");
        datos.last();
        tam = datos.getRow(); //Número de filas a recorrer!
        datos.beforeFirst(); //Dejamos el puntero al inicio, tal como estaba.
        //----------------
        
        //2 - CREACION DE VERTICES - NODOS
        while(datos.next())
        {
            //VERTICE: idParada, Descripcion, Lat, Lng, idvertice
          lista_vertices.add(new Vertice(datos.getInt("idParada"), datos.getString("Descripcion"), datos.getDouble("Lat"), datos.getDouble("Lng")));
          
        }
        //---------------------------
        
        
        //############### DESCRIPCION ############################## ARISTA
       /* datos = persistencia.selectQuery("select * from LINEAS where idLinea='"+idLinea+"'") ;
        datos.next();
        Descripcion += datos.getString("Descripcion");
        
        datos = persistencia.selectQuery("select * from TRAYECTOS where idLinea='"+idLinea+"' and idTrayecto='"+idTrayecto+"'") ;
        datos.next();
        Descripcion += " | "+datos.getString("Descripcion");
         */
        Descripcion = idLinea+" | "+idTrayecto;
         
        //############### DESCRIPCION ############################## ARISTA
        
        
        
        
        //3 - CREACION DE ARISTAS + INSERCION EN EL GRAFO
        //Una vez creados los vertices... hemos de unirlos a pares
        //para formar aristas... a modo de eslabones unidos.
        Vertice uno, dos;
        double distancia = 0;
        
    
                
        uno = lista_vertices.get(0);
        for(int i=1; i<lista_vertices.size(); i++)
        {
           dos = lista_vertices.get(i);      
           //------- CALCULO LA DISTANCIA ENTRE LOS DOS VERTICES - KM´S
           LatLng coordenadaA = new LatLng(uno.getLat(), uno.getLng());     
           LatLng coordenadaB = new LatLng(dos.getLat(), dos.getLng() ); 
    
           distancia = coordenadaA.distance(coordenadaB); //KMS
           //----------------------------------------------------------
           
           resultado.add(new Arista(uno, dos,distancia, Descripcion));
           //graph.insertaArista(new Arista(uno,dos));
           uno = dos;
           
        }
        
        
        //-----------------------------------------
        
        
        
        return resultado;
    }
    
    
    /**Metodo: getTrayectosLinea(int idLinea)
     * Descripcion: Metodo que proporciona los  trayectos que posee una linea dada
     */
    private ArrayList<Integer> getTrayectosLinea(int idLinea) throws SQLException
    {
        ArrayList<Integer> resultado = new ArrayList<Integer>();
        String consulta = "SELECT idTrayecto FROM `TRAYECTOS` WHERE idLinea="+idLinea+" Order by idTrayecto";
        
        
        datos = persistencia.selectQuery(consulta);
        
        while(datos.next())
        {
            resultado.add(datos.getInt("idTrayecto"));
        }    
        
        return resultado;
        
    }
    

    
    /**Metodo 'crearGrafo'
     * Descripcion: Metodo encargado de la creación de un grafo a partir de 
     * una linea!.
     */
    public Grafo crearGrafo(int idLinea)throws SQLException
    {
        Grafo graph = new Grafo();
        ArrayList<Arista> lista_aristas = null;
        ArrayList<Integer> Trayectos = new ArrayList<Integer>(); //Trayectos que posee la linea.
        
        //Obtengo los trayectos por linea.
        Trayectos = this.getTrayectosLinea(idLinea);
        
       /* Trayectos.add(1);
        Trayectos.add(2);
        Trayectos.add(6);
        Trayectos.add(7);*/
        
        
        
        //Recorro cada trayecto
        for(int i=0; i<Trayectos.size(); i++)
        {
            lista_aristas = this.getMontarAristas(idLinea, Trayectos.get(i));
            
            /*He de insertar cada arista creada en el grafo!*/
            for(int j=0; j<lista_aristas.size(); j++)
            {
                graph.insertaArista(lista_aristas.get(j));
            }
            //////////////////////////////////////////////////
            /*En este punto tendre un trayecto completamente insertado
             dentro del grafo... si existen más trayectos.. pues más inserciones.*/
            
            
            
            
        }
        //##########################################################     
        
        return graph; //Devuelvo el grafo creado.
    }
    
    
    /**Metodo: 'crearGrafoCompleto'
     * Descripcion: Metodo que permite la creación de un grafo completo.
     * Esto es, incluye las 33 lineas y todos los trayectos pertenecientes 
     * a cada una de ellas.
     */
    public Grafo crearGrafoCompleto() throws SQLException
    {
        Grafo graph = new Grafo();
        
        //1. Consulto el número de lineas existentes.
        ArrayList<Integer> lineas = this.getLineas();
        
        //2. Recorro cada linea y observo el número de trayectos que posee.
        ArrayList<Integer> Trayectos = null;
        ArrayList<Arista> lista_aristas = null;
        
        for(int i=0; i<lineas.size(); i++) //POR CADA LINEA
        {
            Trayectos = this.getTrayectosLinea(lineas.get(i)); //CONSULTO TRAYECTOS
            
            //3. Sabiendo la linea y el trayecto, he de consultar las aristas que posee
            //   He de recorrer todos los trayectos.
            for(int j=0; j<Trayectos.size(); j++)
            {
                lista_aristas = this.getMontarAristas(lineas.get(i), Trayectos.get(j));
                
                //4. He de recorrer cada arista e introducirla en el grafo
                //   Insertando cada arista creada en el grafo.
                for(int z=0; z<lista_aristas.size(); z++)
                {
                    graph.insertaArista(lista_aristas.get(z));
                }
                
                
            }
            
            
            
            
        
        
        }
        
        
        return graph;
    }
    
    
    /**Metodo 'getLineas'
     * Descripcion: Metodo privado que proporciona todas las lineas existentes. 
     */
    private ArrayList<Integer> getLineas() throws SQLException
    {
        ArrayList<Integer> resultado = new ArrayList<Integer>();
        String consulta = "SELECT idLinea FROM `LINEAS` Order by idLinea";
        
        
        datos = persistencia.selectQuery(consulta);
        
        while(datos.next())
        {
            resultado.add(datos.getInt("idLinea"));
        }    
        
        return resultado;
        
    }
  
}
