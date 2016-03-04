
package grafo;


public class Vertice 
{
    //##########################
    private int idParada;
    private String Descripcion;
    private double Lat, Lng;
    private int idVertice;     //Identificador para poder catalogarlo
    //##########################
    
    //########################### A*
    private Vertice padre;
    private int F,G,H;
	//H - Estimación de la distancia actual hasta la distancia objetivo
	//G - distancia actual
	//F = G + H;
    //########################### A*
    
    
    /**CONSTRUCTOR
     */
    public Vertice(int id, String nombre, double x, double y)
    {
        this.idParada = id;
        this.Descripcion = nombre;
        this.Lat = x;
        this.Lng = y;
        
        this.idVertice = 0;
        
        //######### A*
        this.padre = null;
        
        this.F = 0;
        this.G = 0;
        this.H = 0;
    }

    
    
    @Override public String toString()
    {
        return "\nidParada: "+this.idParada+" Descripcion: "+this.Descripcion+" idVertice: "+idVertice;
    }
    
    public boolean equals(Object obj)
    {
        boolean resultado = false;
        
        if(obj instanceof Vertice)
        {
            if(idParada == ((Vertice)obj).idParada  &&
               Descripcion.equals(  ((Vertice)obj).Descripcion  )  &&
                    Lat == ((Vertice)obj).Lat  &&  Lng == ((Vertice)obj).Lng)
                resultado = true;
        }
        
        return resultado;
        
    }
    
    
    /**
     * @return the idParada
     */
    public int getIdParada() {
        return idParada;
    }

    /**
     * @param idParada the idParada to set
     */
    public void setIdParada(int idParada) {
        this.idParada = idParada;
    }

    /**
     * @return the Descripcion
     */
    public String getDescripcion() {
        return Descripcion;
    }

    /**
     * @param Descripcion the Descripcion to set
     */
    public void setDescripcion(String Descripcion) {
        this.Descripcion = Descripcion;
    }

    /**
     * @return the Lat
     */
    public double getLat() {
        return Lat;
    }

    /**
     * @param Lat the Lat to set
     */
    public void setLat(double Lat) {
        this.Lat = Lat;
    }

    /**
     * @return the Lng
     */
    public double getLng() {
        return Lng;
    }

    /**
     * @param Lng the Lng to set
     */
    public void setLng(double Lng) {
        this.Lng = Lng;
    }

    /**
     * @return the idVertice
     */
    public int getIdVertice() {
        return idVertice;
    }

    /**
     * @param idVertice the idVertice to set
     */
    public void setIdVertice(int idVertice) {
        this.idVertice = idVertice;
    }

    /**
     * @return the F
     */
    public int getF() {
        return F;
    }

    /**
     * @param F the F to set
     */
    public void setF(int F) {
        this.F = F;
    }

    /**
     * @return the G
     */
    public int getG() {
        return G;
    }

    /**
     * @param G the G to set
     */
    public void setG(int G) {
        this.G = G;
    }

    /**
     * @return the H
     */
    public int getH() {
        return H;
    }

    /**
     * @param H the H to set
     */
    public void setH(int H) {
        this.H = H;
    }

    /**
     * @return the padre
     */
    public Vertice getPadre() {
        return padre;
    }

    /**
     * @param padre the padre to set
     */
    public void setPadre(Vertice padre) {
        this.padre = padre;
    }
    
    
    
    
    
    
}
