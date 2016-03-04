
package grafo;

import Busquedas.A_estrella;
import java.sql.SQLException;
import java.util.*;


public class Puente 
{
    private Grafo grafo;
    private String ruta;
    private ArrayList<Vertice> paradas_ruta;
    private boolean camino;
    private ArrayList<Integer> googleMaps;
    private ArrayList<String> listaLineas;
    
    /*CONSTRUCTOR*/
    public Puente() throws SQLException
    {
        Manejador manejador = new Manejador();
        this.grafo = manejador.crearGrafoCompleto(); 
        this.camino = false;
    }
    
    
    /*METODO 'getListaParadas()'
     * Devuelve la totalidad de paradas que contiene el grafo completo
     */
    public ArrayList<Vertice> getListaParadas()
    {        
        return this.grafo.getListaVertices();
    }
    
    
    /*METODO 'getRuta'
     * 
     * Encuentra el camino entre dos puntos dados. siempre que estos no sean iguales
     */
    public void getRuta(int origen, int destino)
    {
        
        if(origen != destino)
        {
            A_estrella nuevo = new A_estrella((Grafo)this.grafo.clone(), origen, destino);
            this.ruta = nuevo.rutaIda();
            this.paradas_ruta = nuevo.getLista_vertices();
            this.googleMaps = nuevo.getGoogleMaps();
            this.listaLineas = nuevo.getlistaLineas();
            if(this.paradas_ruta.size()!=0)   setCamino(true);
            
        }
        
        
        
    }
    
    
    public String getCamino()
    {
        return this.ruta;
    }
    
    public ArrayList<Vertice> getParadas()
    {
        return this.paradas_ruta;
    }

    /**
     * @return the camino
     */
    public boolean isCamino() {
        return camino;
    }

    /**
     * @param camino the camino to set
     */
    public void setCamino(boolean camino) {
        this.camino = camino;
    }
    
    
    public ArrayList<Integer> getGoogleMaps()
    {
        return this.googleMaps;
    }
    
    
    public ArrayList<String> getlistaLineas()
    {
        return this.listaLineas;
    }
    
    
}
