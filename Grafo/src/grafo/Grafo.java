
package grafo;
import java.util.*;

public class Grafo implements Cloneable
{
   //VARIABLES PRIVADAS ################################################# 
   private int nVertices; //Número de vertices del Grafo cargado
   
   /*Hashtable cuya 'key' es un idParada  --- Lista de Vertices  */
   private Hashtable<Integer, ArrayList<Vertice>> lista_adyacencias_idparada; //idParada - Lista de Vertices
  
   
   /*Lista de Vertices cagados en el Grafo*/
   private ArrayList<Vertice> lista_vertices;
   
   /*Lista de Aristas cargadas en el Grafo */
   private ArrayList<Arista> lista_aristas;
   
   
   
   /*Tabla hash para obtener un vertice en función de su idParada.
    * key: idParada.    idParada -> Vertice correspondiente*/
   private Hashtable<Integer, Vertice> lista_vertices_idparada;
   
   /*Tabla hash para obtener un vertice en función de su idvertice
    * key: idvertice.   idvertice -> Vertice correspondiente*/
   private Hashtable<Integer, Vertice> lista_vertices_idvertice;//IDVERTICE NUEVO provisional
   private Hashtable<Integer, ArrayList<Vertice>> lista_adyacencias_idvertice;//ADYECENCIAS POR IDVERTICE NUEVO provisional
   //VARIABLES PRIVADAS #################################################
   
   
    public Object clone()
    {
        Object obj=null;
        try{
            obj=super.clone();
        }catch(CloneNotSupportedException ex){
            System.out.println("Error: no se puede duplicar el objeto");
        }
        return obj;
    }

   
   
    /** CONSTRUCTOR
    */
   public Grafo()
   {
       this.nVertices = 0;
       this.lista_adyacencias_idparada = new Hashtable<Integer, ArrayList<Vertice>>();
       //this.lista_adyacencias = new ArrayList<ListaAdyacencia>();
       this.lista_aristas = new ArrayList<Arista>();
       this.lista_vertices = new ArrayList<Vertice>();
       
       this.lista_vertices_idparada = new Hashtable<Integer, Vertice>();
       
       this.lista_adyacencias_idvertice = new Hashtable<Integer, ArrayList<Vertice>>();
       this.lista_vertices_idvertice = new Hashtable<Integer, Vertice>();
   }
   
   
   
   
   

   
   
   
   
   
   public ArrayList<Vertice> getListaVertices()
   {
       return this.lista_vertices;
   }
   
    public ArrayList<Arista> getListaAristas()
   {
       return this.lista_aristas;
   }
    
    
   /*METODO DE APOYO PROBANDOOOOOOOOOOOOO
     */ 
   private void anadirDescripcion(Arista clon)
   {       
       
       boolean encontrado = false;
       
       /*Recorro todas las aristas...*/
       for(int i=0; i<this.lista_aristas.size() && !encontrado; i++)
       {
           if(this.lista_aristas.get(i).equals(clon))
           {
               this.lista_aristas.get(i).addDescripcion(clon.getDescripcion());
               encontrado=true;
           }
               
       }
       
       
   }
   
   /*METODO NUEVO*/
   public Arista getArista(Vertice origen, Vertice destino)
   {
       Arista resultado = null;
       boolean encontrado = false;
       
       for(int i=0; i<this.lista_aristas.size() && !encontrado; i++)
       {
           if(this.lista_aristas.get(i).getOrigen().equals(origen) &&
                   this.lista_aristas.get(i).getDestino().equals(destino))
           {
               resultado = this.lista_aristas.get(i);
               encontrado = true;
           }
       }
       
    /*   if(resultado == null)
       {
           System.out.println("\n\tNO EXISTE LA ARISTA!!!!!!!!");
           System.out.println("Vertice origen: "+origen.toString());
           System.out.println("Vertice destino: "+destino.toString());
       }*/
       
       return resultado;
   }
   
  
   
   
   /**getAdyacentes(Vertice a)
    * 
    * Devuelve los vertices vecinos del Vertice pasado por parametros
    */
   public ArrayList<Vertice> getAdyacentes(int idParada)
   {
       return (ArrayList<Vertice>)this.lista_adyacencias_idparada.get(idParada);
       
   }
   
   
  /**insertaArista(Arista a)
    * 
    * Inserta una nueva arista en el grafo... y todo lo que 
    * eso trae consigo.
    * 
    * -Insertar vertices.
    */ 
  public void insertaArista(Arista arista)
  {
      //Vertices.....
      Vertice origen = arista.getOrigen();
      Vertice destino = arista.getDestino();
      
      //Inserto los nuevos vertices en el grafo..
      this.setVertice(origen);
      this.setVertice(destino);
      
      
      //Inserto la nueva arista en el conjunto de aristas
      this.setArista(arista);     
      //-------------
      
      
      //Ahora me meto en la lista de adyacencias y uno esos dos vertices
      //que contiene la arista...
      //Vertices que habran sido insertados si no existian....     
      
      if(!this.lista_adyacencias_idparada.get(origen.getIdParada()).contains(destino))
      {
          this.lista_adyacencias_idparada.get(origen.getIdParada()).add(destino);
          
            this.getLista_adyacencias_idvertice().get(  origen.getIdVertice() ).add(destino);
      }
      //------------------------------------------------------------
      
      
  }
  
  
  

  
  
  

  
  
          
  
  /**getNVertices()
   * Devuelve el número de vertices que posee el grafo
   */
  public int getNVertices()
  {
      return this.nVertices;
  }
  
  
  private void setVertice(Vertice a)  
  {
      //Si el vertice no existe, lo inserto.
      if(!this.lista_vertices.contains(a))
      {
          this.lista_vertices.add(a);
          //NUEVO
            this.getLista_vertices_idparada().put(a.getIdParada(), a) ;
          //-------
          this.lista_adyacencias_idparada.put(a.getIdParada(), new ArrayList<Vertice>()) ;
          
          //Le doy a ese vertice un identificador
          a.setIdVertice(this.nVertices);
            this.getLista_vertices_idvertice().put(this.nVertices, a);//PROVISIONAL FLOYD
            this.getLista_adyacencias_idvertice().put(this.nVertices, new ArrayList<Vertice>()) ; //PROVISIONAL FLOYD
          //Incrementamos la cantidad de vertices existentes.
          this.nVertices ++;
      }
      else
      {
   
          Vertice aux;
          aux = this.getLista_vertices_idparada().get(a.getIdParada());   
          a.setIdVertice( aux.getIdVertice() );
      }

  }

  private void setArista(Arista a)
  {
      //Compruebo que la arista no exista ya. Por si acaso.
      if(!this.lista_aristas.contains(a))
      {
          this.lista_aristas.add(a);
      }
      else //EXISTE LA ARISTA............. NUEVO
      {
          
          this.anadirDescripcion(a);
      }


  }

    /**
     * @return the lista_adyacencias_idvertice
     */
    public Hashtable<Integer, ArrayList<Vertice>> getLista_adyacencias_idvertice() {
        return lista_adyacencias_idvertice;
    }

    /**
     * @return the lista_vertices_idvertice
     */
    public Hashtable<Integer, Vertice> getLista_vertices_idvertice() {
        return lista_vertices_idvertice;
    }

    /**
     * @return the lista_vertices_idparada
     */
    public Hashtable<Integer, Vertice> getLista_vertices_idparada() {
        return lista_vertices_idparada;
    }
  
   
   

   
   
}
