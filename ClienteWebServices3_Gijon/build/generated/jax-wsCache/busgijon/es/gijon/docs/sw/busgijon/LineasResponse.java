
package es.gijon.docs.sw.busgijon;

import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlRootElement;
import javax.xml.bind.annotation.XmlType;


/**
 * <p>Clase Java para anonymous complex type.
 * 
 * <p>El siguiente fragmento de esquema especifica el contenido que se espera que haya en esta clase.
 * 
 * <pre>
 * &lt;complexType>
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="lineas" type="{http://docs.gijon.es/sw/busgijon.asmx}LineasBus" minOccurs="0"/>
 *       &lt;/sequence>
 *     &lt;/restriction>
 *   &lt;/complexContent>
 * &lt;/complexType>
 * </pre>
 * 
 * 
 */
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "", propOrder = {
    "lineas"
})
@XmlRootElement(name = "LineasResponse")
public class LineasResponse {

    protected LineasBus lineas;

    /**
     * Obtiene el valor de la propiedad lineas.
     * 
     * @return
     *     possible object is
     *     {@link LineasBus }
     *     
     */
    public LineasBus getLineas() {
        return lineas;
    }

    /**
     * Define el valor de la propiedad lineas.
     * 
     * @param value
     *     allowed object is
     *     {@link LineasBus }
     *     
     */
    public void setLineas(LineasBus value) {
        this.lineas = value;
    }

}
