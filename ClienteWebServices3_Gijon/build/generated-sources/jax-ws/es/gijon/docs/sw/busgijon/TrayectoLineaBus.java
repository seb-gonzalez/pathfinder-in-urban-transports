
package es.gijon.docs.sw.busgijon;

import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlType;


/**
 * <p>Clase Java para TrayectoLineaBus complex type.
 * 
 * <p>El siguiente fragmento de esquema especifica el contenido que se espera que haya en esta clase.
 * 
 * <pre>
 * &lt;complexType name="TrayectoLineaBus">
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="idtrayecto" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="autobuses" type="{http://docs.gijon.es/sw/busgijon.asmx}ArrayOfAutobusTrayectoBus" minOccurs="0"/>
 *       &lt;/sequence>
 *     &lt;/restriction>
 *   &lt;/complexContent>
 * &lt;/complexType>
 * </pre>
 * 
 * 
 */
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "TrayectoLineaBus", propOrder = {
    "idtrayecto",
    "autobuses"
})
public class TrayectoLineaBus {

    protected int idtrayecto;
    protected ArrayOfAutobusTrayectoBus autobuses;

    /**
     * Obtiene el valor de la propiedad idtrayecto.
     * 
     */
    public int getIdtrayecto() {
        return idtrayecto;
    }

    /**
     * Define el valor de la propiedad idtrayecto.
     * 
     */
    public void setIdtrayecto(int value) {
        this.idtrayecto = value;
    }

    /**
     * Obtiene el valor de la propiedad autobuses.
     * 
     * @return
     *     possible object is
     *     {@link ArrayOfAutobusTrayectoBus }
     *     
     */
    public ArrayOfAutobusTrayectoBus getAutobuses() {
        return autobuses;
    }

    /**
     * Define el valor de la propiedad autobuses.
     * 
     * @param value
     *     allowed object is
     *     {@link ArrayOfAutobusTrayectoBus }
     *     
     */
    public void setAutobuses(ArrayOfAutobusTrayectoBus value) {
        this.autobuses = value;
    }

}
