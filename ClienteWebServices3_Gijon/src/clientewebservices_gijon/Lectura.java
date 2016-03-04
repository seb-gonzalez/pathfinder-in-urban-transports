
package clientewebservices_gijon;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;



public class Lectura 
{
    private String filename;
    private String datos;
    //private String Resultado;
    private ArrayList<String> Resultado;
    
    public Lectura(String nombre)
    {
        this.filename = nombre;
        this.datos = "";
        this.Resultado = new ArrayList<String>();
    }
    
    
    /**Metodo: cargarDatos()
     * Metodo encargado de leer el fichero/script 'sql'
     */
    private void cargarDatos() throws IOException
    {
        File archivo = null;
        FileReader fr=null;
        
        try
        {
            archivo = new File(this.filename);
            String linea = "";

            fr = new FileReader(archivo);
            BufferedReader br = new BufferedReader(fr);
            
            
            //Empiezo a leer lineas
            while( (linea = br.readLine()) !=null)
            {
                datos +=linea+"\n";
            }
            
            /*Para asegurarnos de la correcta formacion del
             * script de base de datos las sentencias han de finalizar
             * con ';'
             */
            
            String[] instrucciones = datos.split(";");
            //---------------------------------------------
            
            /*A continuación hemos de asegurarnos que no existan espacios
             * entre instrucciones
             */
            String cadena="";
            for(int i=0; i<instrucciones.length; i++)
            {                
                
                cadena = instrucciones[i].trim();
                if(cadena.length()!=0) this.Resultado.add(cadena);

            }
            
            
            
            
            
            
        } catch (FileNotFoundException ex) 
        {
            System.out.println(ex);
        }
        finally
        {
            try{
                 if( fr != null){   
                    fr.close();     
                 }                  
               }catch (IOException e){ 
                 System.out.println(e);
               }
        }
        
    }
    
    
    /**Metodo: getDatos()
     * Metodo que devuelve una lista de cadenas resultantes
     * de la lectura del fichero o script 'sql'
     */
    public ArrayList<String> getDatos() throws IOException
    {
        this.cargarDatos();
        return this.Resultado;
    }
    
    
}
