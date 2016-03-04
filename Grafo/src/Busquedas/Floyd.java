
package Busquedas;
import camino.*;
import grafo.*;
import java.util.*;

public class Floyd 
{
    
    private Grafo grafo;
    private Transicion transiciones;
    //Lista de vértices que contiene nuestro camino!
    private ArrayList<Vertice> lista_vertices; 
    
    /**CONSTRUCTOR
     */
    public Floyd(Grafo f)
    {
        this.grafo = f;
    }
    
    
   /** -- getValorEtiqueta(idVerticeA, idVerticeB) --
     * Metodo que devuelve el valor
     */ 
   private double getValorEtiqueta(int idverticeA, int idverticeB)
   {
       double valor = 0.0; // Valor a devolver entre los dos vertices
       
       //Obtengo los vertices que forman la arista!
       Vertice verticeOrigen = grafo.getLista_vertices_idvertice().get(idverticeA);
       Vertice verticeDestino = grafo.getLista_vertices_idvertice().get(idverticeB);
       //-------------------------------------------
       
       
       
       /*De entre la lista de aristas.. he de tomar la que tenga estos dos vertices.
         por tanto he de recorrer la lista y donde encuentre coincidencia, devuelvo.*/
       for(int i=0; i<grafo.getListaAristas().size() && valor==0.0; i++)
       {
           	if(grafo.getListaAristas().get(i).getDestino() == verticeDestino &&
		   grafo.getListaAristas().get(i).getOrigen() == verticeOrigen	)
                {
                        valor = grafo.getListaAristas().get(i).getEtiqueta();
                }
           
       }
   
       //Devuelvo el valor de la etiqueta entre los dos vertices
       return valor;
   }
    
    
    
    
    /**-- inicializarCostes( MatrizDistancias )--
     * Metodo de apoyo para inicializar 'MatrizDistancias'
     */
    private void inicializarCostes(double[][] MatrizDistancias)
    {
            int n = grafo.getNVertices();
            ArrayList<Vertice> v;


            for(int i=0; i<n; i++)
            {
                    //Obtengo
                
                    v = grafo.getLista_adyacencias_idvertice().get(i); // Obtengo una lista segun el identificador
                    

                    for(int j=0; j<n; j++)
                    {
                        
                        
                        Vertice temp = grafo.getLista_vertices_idvertice().get(j);
                        
                        
                            if(i == j) MatrizDistancias[i][j] = 0;
                            //else if(v.contains((Integer)(j)))
                            else if(v.contains( temp  ))
                            {
                                    MatrizDistancias[i][j] = this.getValorEtiqueta(i,j) ;
                            }
                            else MatrizDistancias[i][j]=Double.POSITIVE_INFINITY;//65535; //INFINITO


                    }
            }
    }    
    
    
    
    /*-- metodoBase() --
     * Metodo principal del algoritmo
     */
    private int[][] metodoBase()
    {
        int n = grafo.getNVertices();        
        double[][] MatrizDistancias = new double[n][n];
        int[][] MatrizCamino = new int[n][n];

        int i,j,k;

        inicializarCostes(MatrizDistancias);


        for(i=0; i<n; i++)
                for(j=0; j<n; j++)
                        if(i == j) MatrizCamino[i][j] = 0;
                        else MatrizCamino[i][j]=(i);


        for(k=1; k<n; k++)
        {
                for(i=0; i<n; i++)
                {
                        for(j=0; j<n; j++)
                        {
                                if(MatrizDistancias[i][k] + MatrizDistancias[k][j] < MatrizDistancias[i][j] )
                                {
                                        MatrizDistancias[i][j] =MatrizDistancias[i][k] + MatrizDistancias[k][j];
                                        MatrizCamino[i][j] = MatrizCamino[k][j];
                                }




                        }
                }



        }
        //FIN

   /*     for( i=0; i<MatrizCamino.length; i++)
        {
            for( j=0; j<MatrizCamino.length; j++)
            {
                System.out.print(""+MatrizCamino[i][j]+" ");
            }
            System.out.println("");

        }
*/





  //      System.out.println("");
        return MatrizCamino;
    }
    
    
    /**-- getCaminoFloyd(A, B)--
     * 
     * Devuelve el camino entre dos puntos aplicando el algoritmo de Floyd
     * 
     * En principio devolverá un arraylist con la descripcion de cada parada.
     * 
     */
    public String getCaminoFloyd(int paradaOrigen , int paradaDestino) 
    {
        
        String resultado = "";
        //Para las transiciones/enlaces
        ArrayList<ArrayList<String>> enlaces = new ArrayList<ArrayList<String>>();
        
        int a = grafo.getLista_vertices_idparada().get(paradaOrigen).getIdVertice();
        int b = grafo.getLista_vertices_idparada().get(paradaDestino).getIdVertice();

        int[][] estrategia = this.metodoBase(); //aplico Floyd

        Stack<Integer> pila = new Stack<Integer>();
        //Me situo en la fila correspondiente...
        int pos = estrategia[a][b];
        pila.push(b);
        pila.push(pos);

        while(pos!=a)
        {
                pos = estrategia[a][pos];
                pila.push(pos);
        }	

        //--------------------------------------

          
        
        ArrayList<Vertice> temporal = new ArrayList<Vertice>();
        
        
        while(!pila.isEmpty())
        {

                temporal.add(grafo.getLista_vertices_idvertice().get(pila.pop()));
                //resultado.add(grafo.getLista_vertices_idvertice().get(pila.pop()).getDescripcion());
                
        }
        
        
        this.lista_vertices = temporal; //Lista de vértices
        this.transiciones = new Transicion(this.grafo, temporal);
        resultado = this.transiciones.operacion();
        System.out.println("\n\tHemos terminado la operacion!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");

        //System.out.println("\nCamino guapo: "+resultado.toString());
        return resultado;

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
