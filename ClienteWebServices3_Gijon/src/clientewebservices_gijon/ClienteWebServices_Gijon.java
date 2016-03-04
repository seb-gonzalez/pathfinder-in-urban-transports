
package clientewebservices_gijon;




import java.io.IOException;
import java.sql.SQLException;
import java.util.*;
import javax.management.timer.Timer;



public class ClienteWebServices_Gijon {

    
    public static void main(String[] args) throws SQLException//throws IOException, SQLException, InterruptedException 
    {
        boolean bucle = false;
        
        //DECLARACIONES ##################
        Manejador objeto = null; //Objeto principal encargado de las llamadas a inserciones en BD...etc
        java.util.Timer t1 = null;
        Despertador tt = null;
        Date fechaInicial = null;
        Date fechaFinal = null;
        long intervalo_milis = 3 * 60000; //Conexion al servicio cada 3 minutos                
        long tiempoInicio = 0L;
        long tiempoFinal;
        //################################
       
        
        //NÚMERO DE DIAS #################
        long dias = 0L;
        switch(Integer.parseInt(args[0]))
        {
            case 1: dias = 1L;
                break;
            case 2: dias = 2L;
                break;
            case 3: dias = 3L;
            break;
                
            case 4: dias = 4L;
            break;
            
            case 5: dias = 5L;
            break;
                
            case 10: dias = 10L;
            break;
                
            case 15: dias = 15L;
            break;
                
            case 20: dias = 20L;
            break;
                
        }
        //################################
        
   do{    
        
      
        
      try{
          
            /*Si bucle es VERDADERO, he de pausar el ciclo 2 minutos
              para dar tiempo a que el servidor o servicio web se 
              reestablezcan*/
            if(bucle)
            {
                 System.out.println("\n\t## Esperando a que el servidor o servicio web se reestablezca!  [2' de espera]");
                 System.out.println("\t-----------------------------------------------------------------------------------------");
                 System.out.println("\t-----------------------------------------------------------------------------------------\n\n");
                 Thread.sleep(2 * 60000); //2 Minutos
              //   bucle = false; // Vuelvo a ponerlo a falso
            }
            
            //******************************************************
        
            objeto = new Manejador();        
            System.out.println("\n\tProyecto fin de carrera - Open data");
            System.out.println("\n\tCLIENTE : Monitorizara el servicio -- http://docs.gijon.es/sw/busgijon.asmx?wsdl --  ");
            System.out.println("\t-----------------------------------------------------------------------------------------\n\n");

            //DESPERTADOR ##################################################
            if(!bucle)
            {
             t1 = new java.util.Timer();
             tt = new Despertador();       
             fechaInicial = new java.util.Date();  

             //Aqui indicamos el numero de dias que queremos la programacion
             //1L * Timer.Day  - 1 dia ...etc
             //Ahora mismo esta programado a 5 dias
             fechaFinal = new Date(fechaInicial.getTime() + dias * Timer.ONE_DAY);
             //fechaFinal = new Date(fechaInicial.getTime() + 10L * Timer.ONE_MINUTE);
             t1.schedule(tt, fechaFinal);
            }              
            //DESPERTADOR ##################################################

             System.out.println("\n\tFecha de inicio de la monitorizacion: "+fechaInicial);             
             System.out.println("\n\tFecha de finalizacion de la monitorizacion: "+fechaFinal);    

               //CODIGO A EJECUTAR....

              if(bucle)
              {
                  bucle = false;
              }
              else tiempoInicio = System.currentTimeMillis();
              
              // ZONAESTATICA ################################ Solo se carga una vez !!
              System.out.println("\n\tCargando zona estatica ...");
              objeto.zonaEstatica();                      
              //############################################## Solo se carga una vez !!





              
              do
              { 
                  // ZONADINAMICA ################################
                  System.out.println("\n\tCargando zona dinamica ...");
                  objeto.zonaDinamica();
                  System.out.println("\tZona dinamica cargada.");                          
                  tiempoFinal = System.currentTimeMillis() - tiempoInicio;
                  System.out.println("\tTiempo transcurrido: "+ (double)((tiempoFinal/1000)/60)/60 +" horas.");



                  System.out.println("\tEsperando a la proxima conexion ......... ");
                  Thread.sleep(intervalo_milis);                             


                  //Contabilizo el tiempo maximo de ejecucion para salir del bucle...
                  tiempoFinal = System.currentTimeMillis() - tiempoInicio;

                // }while(tiempoFinal < tiempoMaximo);    
              }while(Despertador.variable_global != 84);
              
               
               
              
      }                
      catch(Exception e) 
      {
          objeto.capturaExcepcion(e);                
          bucle = true;          
          
          System.out.println("\n\t## Excepcion capturada ["+new java.util.Date().toString()+"], pasamos a la espera...");

      }
      finally
      {
              if(!bucle) //Sí bucle == false, detruimos el timer...etc
              {
               //############################################################ 
               t1.cancel(); //Destruimos el timer############################
               //############################################################
               
               
               objeto.cerrarConexion();
               System.out.println("\n\tFecha de finalizacion de la monitorizacion: "+fechaFinal);             
               //System.out.println("\n\tEl tiempo de duracion ha sido: "+(double)(tiempoFinal/1000)/60+" Minutos");
               System.out.println("\n\tSaliendo de la aplicacion ... ");
               
              }
              else //Bucle true....
              {
                  //Cerramos la conexión y abriremos una nueva...
                  objeto.cerrarConexion();
              }

               
     
               
      }
      
      
      
   }while(bucle); 
   
            
    }  
    
}
