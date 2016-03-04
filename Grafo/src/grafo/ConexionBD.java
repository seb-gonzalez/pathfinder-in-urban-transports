package grafo;


import java.io.IOException;
import java.sql.*;
import java.util.ArrayList;






public class ConexionBD 
{
    private Connection conexion;
    private ResultSet result;
    private Statement statement;
    
    
    /*CONSTRUCTOR
     */
    public ConexionBD() throws SQLException
    {
        inicializarConexion();
      
    }
    
    
   
    
    /*INICILIZARCONEXION()
     * Metodo encargado de:
     * - Carga del Driver
     * - Establecimiento de la conexión según datos
     * - Control de excepciones
     */
    private void inicializarConexion()
    {
        
        //Datos básicos de la conexión a nuestra BD - PFC -
        String url = "jdbc:mysql://localhost:3306/sebastian";
        String user = "root"; //root
        String pass = "2237"; //admin
   
        
        //-------------------------------------------------
        
        try
            {
                //Carga del Driver
                Class.forName("com.mysql.jdbc.Driver"); 
                
                //Establecemos la conexión con la BD
                conexion = java.sql.DriverManager.getConnection(url, user, pass) ;
                
                if(conexion != null)
                {
                    statement = conexion.createStatement();
                    
                }
                
            }
            catch(SQLException e)
            {
                System.out.println("\tNo se pudo acceder a la base de datos: \n"+e.toString());
                
            }
            catch(ClassNotFoundException e)
            {
                System.out.println("\tNo se pudo establecer conexion con la base de datos: \n"+e.toString());
                
            }
    }
    
    
    /* SelectQuery ---------------------------------------
     * Funcion que se encarga de realizar una consulta
     * que ha de devolver un resultset
     */
    public ResultSet selectQuery(String query) throws SQLException 
    {
        
        result = this.statement.executeQuery(query);
        return result;
    }
    
    
     public final void IUD(String query) throws SQLException 
     {
        statement.executeUpdate(query);         
        
        
     }
 
    /* CLOSE
      * Funcion que permite cerrar la conexion
      */
     public final void close() throws SQLException 
     {
          if(result != null)
           result.close();

          if(statement != null)
           statement.close();

          if(conexion != null)
           conexion.close();   
          
          
         // System.out.println("\tLa conexion con la BD se ha cerrado correctamente.");
     } 
    
    
    
}
