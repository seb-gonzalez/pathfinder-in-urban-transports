
package grafo;
import java.util.*;

/**
 *
 * @author HP_Propietario
 */
public class Arista 
{
    
    private Vertice origen, destino;
    private double etiqueta;
    //PROBANDO
    private ArrayList<String> Descripcion;
    
    /**CONSTRUCTOR
     */
    public Arista(Vertice a, Vertice b, double distancia, String Descripcion)
    {
        this.origen = a;
        this.destino = b;
        this.etiqueta = distancia;
        this.Descripcion = new ArrayList<String>();
        this.Descripcion.add(Descripcion) ;
    }

    
    @Override public String toString()
    {
        return "\n*Arista: \nOrigen: "+origen.toString()+"\nDestino: "+destino.toString()+"\nDescripcion: "+Descripcion.toString();
    }
    
    public boolean equals(Object objeto)
    {
        boolean resultado = false;
        
        if(objeto instanceof Arista)
        {
            if(origen.equals(((Arista)objeto).getOrigen()) &&
               destino.equals(((Arista)objeto).getDestino()))
               resultado = true;
            
        }
        
        return resultado;
    }
    
    
    /**
     * @return the origen
     */
    public Vertice getOrigen() {
        return origen;
    }

    /**
     * @param origen the origen to set
     */
    public void setOrigen(Vertice origen) {
        this.origen = origen;
    }

    /**
     * @return the destino
     */
    public Vertice getDestino() {
        return destino;
    }

    /**
     * @param destino the destino to set
     */
    public void setDestino(Vertice destino) {
        this.destino = destino;
    }

    /**
     * @return the etiqueta
     */
    public double getEtiqueta() {
        return etiqueta;
    }

    /**
     * @return the Descripcion
     */
    public ArrayList<String> getDescripcion() {
        return Descripcion;
    }

    /**
     * @param Descripcion the Descripcion to set
     */
    public void addDescripcion(ArrayList<String> registro) {
        
        
        for(int i=0; i<registro.size(); i++)
        {
            if(!this.Descripcion.contains(registro.get(i)))
            {
                this.Descripcion.add(registro.get(i));
            }
        }
        
        
    }
    
    
}
