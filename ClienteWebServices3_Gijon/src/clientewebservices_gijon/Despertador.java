
package clientewebservices_gijon;

import java.util.TimerTask;

public class Despertador extends TimerTask{
    
    public static int variable_global;
    
    public Despertador()
    {
        this.variable_global = 0;
        
    }
    
    @Override
    public void run() {
        
                
        variable_global = 84;
        
       
        
    }
    
}