
package camino;
import java.util.*;
import grafo.*;
/**
 *
 * @author HP_Propietario
 */
public class Transicion 
{
    private ArrayList<ArrayList<String>> Lista;
    private ArrayList<Bloque> contempladas;
    private ArrayList<String> Resultado;
    
    private Grafo grafo;
    private ArrayList<Vertice> lista_vertices;
    
    private ArrayList<Integer> googleMaps;
    private ArrayList<String> listaListas;
    

    
    /*CONSTRUCTOR*/
    public Transicion(Grafo graph, ArrayList<Vertice> lista_vertices)
    {
        
        this.grafo = graph;
        this.lista_vertices = lista_vertices;
        
        this.contempladas = new ArrayList<Bloque>();
        this.Resultado = new ArrayList<String>();
        this.Lista = new ArrayList<ArrayList<String>>();
        
        this.googleMaps = new ArrayList<Integer>();
        this.listaListas = new ArrayList<String>();
        
    }
    
    
    
    
    private void contemplar(ArrayList<String> uno, ArrayList<String> dos)
    {
        ArrayList<String> comunes = new ArrayList<String>();
        
        for(int i=0; i<uno.size(); i++)
        {
            if(  dos.contains(uno.get(i)) )
            {
                comunes.add(uno.get(i));
            }
        }
        
        if(comunes.isEmpty())    comunes.addAll(dos);
        
        
                if(this.contempladas.isEmpty())
                {
                    this.contempladas.add(new Bloque((ArrayList<String>)comunes.clone()));
                }
                else
                {
                    //Si no esta vacia...
                    //Pregunto si es un Transbordo...
                    //Pregunto al ultimo elemento e la lista..
                    int n = this.contempladas.size();
                    boolean resultado = this.contempladas.get(n-1).insertarenBloque(comunes);
                    
                    if(!resultado) //No se ha insertado correctamente el bloque
                    {
                        //Creamos un bloque transbordo
                        Bloque a = new Bloque(null);
                        a.setTransbordo(true);
                        this.Resultado.add("Transbordo"); 
                        this.contempladas.add(a); //INSERTO EL TRANSBORDO
                        this.contempladas.add(new Bloque((ArrayList<String>)comunes.clone())); //Elemento dentro
                    }                   
                  
                    
                    
                }        
        
    }
    
    
    /**METODO 'operacion'
     * 
     * Devuelve una lista de transiciones
     */
    public String operacion() 
    {
        ArrayList<String> uno, dos;
        ArrayList<String> resultado = new ArrayList<String>(); //RUTA
        /*Paradas de cambio de línea*/
        ArrayList<String>  paradasTransbordo = new ArrayList<String>();
        String resultado2 = "\t"; // Ruta 2 
        
        this.GenerarTransiciones();
        Vertice ultimo = null; //Vertice que queda a la cola en cada transbordo
        int kmTotal = 0; //Kilometros totales
        
        //  $cadena .= "new google.maps.LatLng(".$posiciones['Lat'].",".$posiciones['Lng'].")".$coma;
        
        
        uno = this.Lista.get(0);
        this.contemplar(uno, uno);
        for(int i=1; i<this.Lista.size(); i++)
        {
            dos = this.Lista.get(i);
            this.contemplar(uno, dos);
            uno = dos;
        }
        
      
       
        int n=0;
        int j=0;
        int contador = 0;
        int ancla=-1;
        
        for(int i=0; i<this.contempladas.size(); i++)
        {
            if(!this.contempladas.get(i).isTransbordo())
            {
                
                
                n = this.contempladas.get(i).getnEnlaces();
                //** probando
                resultado2 += "<br>Línea "+this.contempladas.get(i).getLista().get(0)+" : ";
                //** probando
                
                for(int i2=0; i2<n; i2++)
                {
                   // System.out.println("\n\t Enlace: "+this.contempladas.get(i).getLista().get(0));
                    if(j==0)
                    {
                        resultado.add(this.lista_vertices.get(j).getDescripcion());  //Parada 1
                    
                        resultado2+="<b><i>"+this.lista_vertices.get(j).getDescripcion()+"</i></b>, "; //PROBANDOOOOOO
                        contador++;
                    
                    }
                    j++;
                    
                    //**************************
                    if(ultimo != null)
                    {
                        resultado2+=""+ultimo.getDescripcion()+", "; //PROBANDOOOOOO
                        ultimo = null;
                    }
                    //**************************
                    
                    resultado.add(this.contempladas.get(i).getLista().get(0)); //Interserccion
                    
                    if(ancla != i)
                    {
                        this.listaListas.add(this.contempladas.get(i).getLista().get(0)); //CAPTURO LAS INTERSECCIONES SIN REPETIR.. LINEAS!!!
                        ancla = i;
                    }
                    
                            
                    
                    
                    resultado.add(this.lista_vertices.get(j).getDescripcion());  //Parada 2
                   
                    
                    
                    if( (i+1) == this.contempladas.size()  &&  (i2+1) == n )
                    {
                        resultado2+="<b><i>"+this.lista_vertices.get(j).getDescripcion()+"</i></b>";
                    }
                    else
                    {
                        resultado2+=""+this.lista_vertices.get(j).getDescripcion()+""; //PROBANDOOOOOO
                    }
                    
                   if((i2+1) == n) 
                   {
                       ultimo = this.lista_vertices.get(j); //Capturo la ultima parada de cada serie
                       resultado2+=".  Km´s: "+(ultimo.getG());
                       kmTotal += ultimo.getG();
                       
                       //Capturo los transbordos!!!!!!!!!!!!!!!!!!!!
                       
                       if( (i+2) < this.contempladas.size() )
                       {
                           
                           
                           if( (i+3) < this.contempladas.size() )
                           {
                               paradasTransbordo.add(ultimo.getDescripcion()+", ");
                           }
                           else
                           {
                               paradasTransbordo.add(ultimo.getDescripcion()+". ");
                           }
                       }
                       
                   }
                   else resultado2+=", ";
                    
                    contador++;
                    
                }
                
                this.googleMaps.add(contador); contador = 0;
                resultado2+="\n\t<br>";//PROBANDO
                
            }else 
            {
                    resultado.add("Transbordo");
                    resultado2+="<br><b>[TRANSBORDO]</b><br>\n\t";
                   // System.out.println("\n\t Transbordo!!! ");
            }    
            
            
        }        
    //System.out.println("\n\t"+resultado2);
        
        resultado2+="<br>\t<hr># Kilometros recorridos en total: "+kmTotal+".";
                
        
        if(paradasTransbordo.size() > 0)
        {
            resultado2 += "<br># Paradas de transbordo: ";
            
            for(int i=0; i<paradasTransbordo.size(); i++)
            {
                resultado2+=paradasTransbordo.get(i);
            }    
        }
            
        
        return resultado2;
        
    }//************************************************************
    
    
    /*METODO 'GenerarTransiciones'
     * Metodo para a partir de la lista de vértices que obtenemos al inicio,
     * obtener las transiciones entre cada par de vertices
     **/
    private void GenerarTransiciones() 
    {
        Vertice uno, dos;
        Arista auxiliar=null;
        int i=0;
        dos = this.lista_vertices.get(1);
        
        
        uno = this.lista_vertices.get(0);
        for( i=1; i<this.lista_vertices.size(); i++)
        {
            
            
            
            
            dos = this.lista_vertices.get(i);
            //Monto la Arista...............................
            auxiliar = this.grafo.getArista(uno, dos) ;                
            //Obtengo el enlace o transiciones...            
            this.Lista.add(auxiliar.getDescripcion());
            
            
            uno = dos;
        }
      
        
        
        
        
    }
    
    
    
    public ArrayList<Integer> getGoogleMaps()
    {
        return this.googleMaps;
    }
    
    public ArrayList<String> getlistaLineas()
    {
        return this.listaListas;
    }
    
  
    
    
}
