
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
 *         &lt;element name="paradastrayecto" type="{http://docs.gijon.es/sw/busgijon.asmx}ParadasTrayectosBus" minOccurs="0"/>
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
    "paradastrayecto"
})
@XmlRootElement(name = "ParadasTrayectosResponse")
public class ParadasTrayectosResponse {

    protected ParadasTrayectosBus paradastrayecto;

    /**
     * Obtiene el valor de la propiedad paradastrayecto.
     * 
     * @return
     *     possible object is
     *     {@link ParadasTrayectosBus }
     *     
     */
    public ParadasTrayectosBus getParadastrayecto() {
        return paradastrayecto;
    }

    /**
     * Define el valor de la propiedad paradastrayecto.
     * 
     * @param value
     *     allowed object is
     *     {@link ParadasTrayectosBus }
     *     
     */
    public void setParadastrayecto(ParadasTrayectosBus value) {
        this.paradastrayecto = value;
    }

}
