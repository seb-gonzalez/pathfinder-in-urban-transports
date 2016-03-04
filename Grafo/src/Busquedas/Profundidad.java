
package Busquedas;
import grafo.*;
import java.util.*;
import camino.*;

public class Profundidad 
{
    
    private Grafo grafo;
    /*Lista de vertices del camino*/
    private ArrayList<Vertice> lista_vertices;
    
    
    /**CONSTRUCTOR
     */
    public Profundidad(Grafo f)
    {
        this.grafo = f;
    }
    
    
    /** -- getRecorridoProfundidad(A, B) --
     * Metodo que devuelve un arraylist de cadenas que contienen la descripción
     * de las paradas a visitar.
     */
    public String getRecorridoProfundidad(int idParadaInicio, int idParadaFin)             
    {
        
      String resultado="";
      ArrayList<Vertice> ruta = new ArrayList<Vertice>();
      
      Vertice  inicio = grafo.getLista_vertices_idparada().get(idParadaInicio);
      Vertice  fin = grafo.getLista_vertices_idparada().get(idParadaFin);
      
      
      boolean encontrado = false;
      Stack<Vertice> pila = new Stack<Vertice>();
      ArrayList<Vertice> ady;
      boolean procesados[] = new boolean[grafo.getNVertices()];
      
      for(int i=0; i<grafo.getNVertices(); i++) procesados[i] = false;
      
      Vertice u, w;
      
      
      pila.push(inicio); //Guardo en la pila el vertice de partida
      procesados[inicio.getIdVertice()] = true; //Lo marco como procesado
      
      //Mientras la pila no este vacia O no se haya encontrado el fin.
      while(!pila.isEmpty() && !encontrado)
      {
          u = pila.pop(); //Tomo el primer Vertice de la pila y lo visito!
          
          //System.out.print(u+" "); //VISITA
         // resultado.add(u.getDescripcion()); //INSERTO EL VERTICE VISITADO
           ruta.add(u); //INSERTO EL VERTICE VISITADO
          
          if(! u.equals(fin))
          {
              ady = grafo.getAdyacentes(u.getIdParada()); //Tomo los vecino de ese vertice.
          
              for(int j=0; j<ady.size(); j++)              
              {
                  w = ady.get(j);

                  if(!procesados[w.getIdVertice()])
                  {
                      pila.push(w);
                      procesados[w.getIdVertice()] = true;
                  }
              }
          }
          else encontrado = true; //vertice encontrado!
          
          
          
      }
      
      //System.out.println("");
     // System.out.println("\n\tLa lista de vertices es: "+ruta.toString());
       this.lista_vertices = ruta;
       Transicion transiciones = new Transicion(this.grafo, ruta);
       resultado = transiciones.operacion();
      
      
      return resultado; //Devuelvo el resultado
    }
    
    
    /**Metodo 'getLista_vertices()'
     * 
     * Devuelve los vertices que contiene el camino optimo
     */
    public ArrayList<Vertice> getLista_vertices()
    {
        return this.lista_vertices;
    }
    
    
    
}
