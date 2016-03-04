
package Busquedas;
import grafo.*;
import java.util.*;
import uk.me.jstoot.jcoord.LatLng;
import camino.*;

/*Clase que implementa los metodos adecuados para obtener el Algoritmo A*
 */

public class A_estrella 
{
    private Grafo grafo;
    private ArrayList<Vertice> listaAbierta;
    private ArrayList<Vertice> listaCerrada;
    
    private Vertice origen; //Vertice que representa la parada inicial - idParadaInicio 
    private Vertice destino; //Vertice que representa la parada de llegada - idParadaFinal
    
    private Stack<Vertice> PILA;
    
    /*Lista de vertices que contiene el camino*/
    private ArrayList<Vertice> lista_vertices;
    
    private ArrayList<Integer> googleMaps;
    private ArrayList<String> listaListas;
    
    
    
    
    public A_estrella(Grafo f, int paradaOrigen, int paradaDestino)
    {
        this.listaAbierta = new ArrayList<Vertice>();
        this.listaCerrada = new ArrayList<Vertice>();
        this.grafo = f;
        this.origen = grafo.getLista_vertices_idparada().get(paradaOrigen);
        this.destino = grafo.getLista_vertices_idparada().get(paradaDestino);
        this.PILA = new Stack<Vertice>();
        
        
        
    }
    
    
    
    /**Metodo 'algoritmoPathfinding()'
     * Descripcion: Metodo principal que genera el algoritmo A*.
     */
    private Vertice algoritmoPathfinding()
    {
        
        
        
        Vertice Actual = null;
        this.listaAbierta.add(this.origen);
        
        //********************************************
        while(this.listaAbierta.size() != 0)
        {
            //Busco el vertice con el coste F más bajo en la lista abierta
            Actual = this.verticeConMenorF(listaAbierta);
            //Lo cambio a la lista cerrada
            this.listaCerrada.add(Actual); 
            
            //Si el vertice Actual es igual al destino... devuelvo el destino
            if(Actual.equals(this.destino))
            {
                return Actual; //Fin del Algoritmo!!, aquí devuelvo el vertice Destino!
            }
            else
            {
                //Tomo los vertices sucesores al vertice Actual!
                ArrayList<Vertice> adyacentes = grafo.getAdyacentes(Actual.getIdParada());
                //****************************************************
                /*Por cada vertice adyacente coloco G, H , F*/
                for(int i=0; i<adyacentes.size(); i++)
                {
                    
                    
                    
                    
                    if(this.listaCerrada.contains(adyacentes.get(i)) == false && this.listaAbierta.contains(adyacentes.get(i)) == false)
                    {
                        
                        /*Si no está en la lista abierta, lo añado a la lista abierta. Hago que el vertice Actual
                         sea el padre de este vertice adyacente. Almaceno los costes F, G y H.*/
                        
                        //##################################### F = G + H
                        this.setEcuacion(Actual, adyacentes.get(i));
                        //##################################### F = G + H
                        
                        //Añado el adyacente a la lista abierta
                        //Ya apunta al padre que es Actual, por supuesto.
                        adyacentes.get(i).setPadre(Actual);
                        //Y las F, G y H, estan calculadas.
                        this.listaAbierta.add(adyacentes.get(i));
                    }
                    else if(this.listaAbierta.contains(adyacentes.get(i)) == true) //Abierta contiene al elemento adyacente
                    {
                            if(adyacentes.get(i).getG() < Actual.getG())
                            {
                                /*Si ya está en la lista abierta, compruebo si el camino es mejor usando el coste G
                                 como baremo. Efectivamente lo es puesto que estamos dentro.
                                 
                                 Un coste G menor significa qu eeste es un mejor camino. Así que cambio el padre del
                                 vertice por el del vertice actual y recalculo la F, G y H.*/
                        
                                 //##################################### F = G + H
                                 this.setEcuacion(Actual, adyacentes.get(i));
                                 //##################################### F = G + H
                                 
                                 adyacentes.get(i).setPadre(Actual); // Cambio al padre!!!!
                                 //Pero puesto que aqui no hay diagonales, pues no cambio la G y F.
                                 //System.out.println("CAMBIO EL PADRE!");
                            }
                    }
                }//Fin del for
                
            }//Fin del else
            
        }
        //********************************************
        this.listaAbierta.clear();
	this.listaCerrada.clear();
        System.out.println("Algoritmo A* Devuelve NULO. ERROR!");
        return Actual;
    }
    
    
    
    /**Metodo 'setEcuacion'
     * Metodo encargado de establecer los valores de la ecuación F = G + H
     */
    private void setEcuacion(Vertice padre, Vertice vertice)
    {
        
       //------- CALCULO LA DISTANCIA ENTRE LOS DOS VERTICES - KM´S - H
       LatLng coordenadaA = new LatLng(vertice.getLat(), vertice.getLng());     
       LatLng coordenadaB = new LatLng(destino.getLat(), destino.getLng() ); 

       int distancia = (int) Math.floor( coordenadaA.distance(coordenadaB) ); //KMS
       //----------------------------------------------------------
       
       //------- CALCULO LA DISTANCIA ENTRE LOS DOS VERTICES - KM´S - G
       LatLng coordenadaA1 = new LatLng(padre.getLat(), padre.getLng());     
       LatLng coordenadaB1 = new LatLng(vertice.getLat(), vertice.getLng() ); 

       int distancia1 = (int) Math.floor( coordenadaA1.distance(coordenadaB1) ); //KMS
       //----------------------------------------------------------
        
        /**G
         * Es el coste del movimiento para ir desde el punto inicial a un cierto vertice
         */
        vertice.setG( padre.getG() + distancia );
        
        /**H
         * Coste del movimiento estimado para ir desde ese vertice hasta el vertice final. Esta H
         * emplea cierta heurística, que como tal es una suposición -estimación-
         */
        vertice.setH( padre.getH() + distancia);
        
        /**F
         * F es la suma de G + H
         */
        vertice.setF( vertice.getG() + vertice.getH() ); // F = G + H
    }
    
    
    /**Metodo 'verticeConMenorF'
     * F es la heuristica empleada para calcular el camino óptimo hasta el destino
     * y siempre hemos de tomar el menor para asegurarnos dicha acometida.
     * */
    private Vertice verticeConMenorF(ArrayList<Vertice> lista)
    {
        Vertice resultado = null;

        resultado = lista.get(0);
        if(lista.size()>1)
        {
                for(int i=1; i<lista.size(); i++)
                {
                        if(lista.get(i).getF() < resultado.getF())
                        {
                                resultado = lista.get(i);
                        }
                }
        }


        lista.remove(resultado); //elimino el nodo que tomo como menor

        return resultado;	
    }
    
    
    /**Metodo 'recursivo'
     * Descripción: Metodo que utilizo para recorrer todos los nodos padres
     * conectados desde el destino (Bandera enemiga) hasta el nodoInicio desde 
     * el cual parte mi Agente. Durante el recorrido voy guardando las posiciones
     * que definen el camino para poder tratarlo en una conversión de movimientos.
     * */
    private Vertice recursivo(Vertice A, Vertice origen)
    {
        
        if(A.equals(origen))
        {
            //System.out.println("FINAL!!!");
            PILA.push(A);
            //El origen no hace falta ponerlo ya que es 0 el avance.
            return A;
        }
        else
        {
            PILA.push(A);
            return recursivo(A.getPadre(), origen);
        }       

    }
    
    
    /**Metodo 'obtenerRecorrido'
     * Descripcion: Metodo que recibe una pila con todos los vertices
     * que describen el recorrido a tomar para ir desde el Vertice origen 
     * al Final.s
     */
    private ArrayList<Vertice> obtenerRecorrido(Stack<Vertice> pila)
    {
        ArrayList<Vertice> resultado = new ArrayList<Vertice>();
        
        while(!pila.empty())
        {
            resultado.add(pila.pop());
        }
        
        
        return resultado;
    }
    
    
    
    
    
    /**Metodo 'rutaIda'
     * Descripcion: metodo en el que organizamos las distintas llamadas a metodos
     * para proporcionar a quien lo necesite un listado de movimientos a realizar
     * entre 'nodoInicio' ------------>>>>> 'nodoDestino'
     **/
    public String rutaIda() 
    {
        //ArrayList<String> ruta;
        ArrayList<Vertice> ruta;
        String resultado;

        //1. A* devuelve el verticeDestino con los enlaces a todos los vertices que conforman el camino
        Vertice Destino =  this.algoritmoPathfinding();

        //2. Transcribo ese camino en posiciones sobre el mapa
        recursivo(Destino, this.origen);

        //3. Transformo esas posiciones en movimientos reales para el agente
        ruta = this.obtenerRecorrido(PILA);
        
        this.lista_vertices = ruta;
        
        Transicion transiciones = new Transicion(this.grafo, ruta);
        resultado = transiciones.operacion();
        this.googleMaps = transiciones.getGoogleMaps(); // PROBANDO
        this.listaListas = transiciones.getlistaLineas(); //PROBANDO - Ultima modificacion 
       

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
    
  
    
    public ArrayList<Integer> getGoogleMaps()
    {
        return this.googleMaps;
    }
    
    public ArrayList<String> getlistaLineas()
    {
        return this.listaListas;
    }
    
}
