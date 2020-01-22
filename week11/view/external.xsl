<?xml version="1.0" encoding="utf-8"?> 
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0" >
<xsl:output method="xml" version="1.0" omit-xml-declaration="yes" indent="yes" media-type="text/html"/>
   	 
<xsl:template match="/">
	<!-- <xsl:element name="h1">
		<xsl:text>There are </xsl:text>
        <xsl:value-of select="count(rss/channel/item)" />
        <xsl:text> articles</xsl:text>
    </xsl:element>-->
	<xsl:apply-templates select="/rss/channel/item" />
</xsl:template>


<xsl:template match="item">
<tr>
<th>
<xsl:value-of select="./title"/> </th>	
<!-- <th>
<xsl:value-of select="./description"/> 
</th>-->



	<th>	
	<a>
	  <xsl:attribute name="href"> 
		<xsl:value-of select="./link"/>
	  </xsl:attribute>
	 <xsl:text> Go here </xsl:text><br/><br/>
	</a>
	</th>
	
	</tr>
</xsl:template>

</xsl:stylesheet>