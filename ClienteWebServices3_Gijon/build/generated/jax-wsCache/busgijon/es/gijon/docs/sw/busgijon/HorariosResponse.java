
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
 *         &lt;element name="horarios" type="{http://docs.gijon.es/sw/busgijon.asmx}HorariosBus" minOccurs="0"/>
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
    "horarios"
})
@XmlRootElement(name = "HorariosResponse")
public class HorariosResponse {

    protected HorariosBus horarios;

    /**
     * Obtiene el valor de la propiedad horarios.
     * 
     * @return
     *     possible object is
     *     {@link HorariosBus }
     *     
     */
    public HorariosBus getHorarios() {
        return horarios;
    }

    /**
     * Define el valor de la propiedad horarios.
     * 
     * @param value
     *     allowed object is
     *     {@link HorariosBus }
     *     
     */
    public void setHorarios(HorariosBus value) {
        this.horarios = value;
    }

}
