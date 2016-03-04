
package camino;
import java.util.*;


public class Bloque 
{
    
    private ArrayList<String> lista;
    private boolean transbordo;
    private int nEnlaces;
    
    /*CONSTRUCTOR*/
    public Bloque( ArrayList<String> l )
    {
        this.lista = l;
        this.setTransbordo(false);
        this.nEnlaces = 1;
    }
    
     @Override public String toString()
    {
        if(transbordo) return "\n\t TRANSBORDO";
        else return "\n\tBloque: "+lista.toString()+" Enlaces: "+this.nEnlaces;
    }
    
    
    /**METODO 'Compatibles'
      */ 
    private ArrayList<String> Compatibles(ArrayList<String> listado)
    {
        ArrayList<String> resultado = new ArrayList<String>();
        
        for(int i=0; i<listado.size(); i++)
        {
            if(this.lista.contains(listado.get(i)))
            {
                resultado.add(listado.get(i));
            }
        }
        
        return resultado;
    }
    
    public boolean insertarenBloque(ArrayList<String> l)
    {
        boolean resultado = true;
        //1º He de comprobar existen elementos comunes
        ArrayList<String> aux = this.Compatibles(l);
       
        if(aux.size() != 0)
        {
            if(this.lista.size() > aux.size())
            {
                this.lista.clear();
                this.lista.addAll(aux);
                
            }
            
            this.nEnlaces ++; //incremento el número de enlaces
        }
        else
        {
            resultado = false; //No se ha insertado nada.
        }
        
        return resultado;
        
    }
    
    public ArrayList<String> getLista()
    {
        return this.lista;
    }

    /**
     * @return the transbordo
     */
    public boolean isTransbordo() {
        return transbordo;
    }

    /**
     * @param transbordo the transbordo to set
     */
    public void setTransbordo(boolean transbordo) {
        this.transbordo = transbordo;
    }

    /**
     * @return the nEnlaces
     */
    public int getnEnlaces() {
        return nEnlaces;
    }

    /**
     * @param nEnlaces the nEnlaces to set
     */
    public void setnEnlaces(int nEnlaces) {
        this.nEnlaces = nEnlaces;
    }
    
}
