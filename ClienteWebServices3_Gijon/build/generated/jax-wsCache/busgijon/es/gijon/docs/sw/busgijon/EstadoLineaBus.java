
package es.gijon.docs.sw.busgijon;

import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlType;


/**
 * <p>Clase Java para EstadoLineaBus complex type.
 * 
 * <p>El siguiente fragmento de esquema especifica el contenido que se espera que haya en esta clase.
 * 
 * <pre>
 * &lt;complexType name="EstadoLineaBus">
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="trayectos" type="{http://docs.gijon.es/sw/busgijon.asmx}ArrayOfTrayectoLineaBus" minOccurs="0"/>
 *       &lt;/sequence>
 *     &lt;/restriction>
 *   &lt;/complexContent>
 * &lt;/complexType>
 * </pre>
 * 
 * 
 */
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "EstadoLineaBus", propOrder = {
    "trayectos"
})
public class EstadoLineaBus {

    protected ArrayOfTrayectoLineaBus trayectos;

    /**
     * Obtiene el valor de la propiedad trayectos.
     * 
     * @return
     *     possible object is
     *     {@link ArrayOfTrayectoLineaBus }
     *     
     */
    public ArrayOfTrayectoLineaBus getTrayectos() {
        return trayectos;
    }

    /**
     * Define el valor de la propiedad trayectos.
     * 
     * @param value
     *     allowed object is
     *     {@link ArrayOfTrayectoLineaBus }
     *     
     */
    public void setTrayectos(ArrayOfTrayectoLineaBus value) {
        this.trayectos = value;
    }

}
