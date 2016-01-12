<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                xmlns:rss="http://purl.org/rss/1.0/"
                xmlns:dc="http://purl.org/dc/elements/1.1/"
                xmlns:syn="http://purl.org/rss/1.0/modules/syndication/"
                xmlns="http://www.w3.org/1999/xhtml"
                version="1.0">
<xsl:output indent="yes"/>
<xsl:template match="rdf:RDF">
   <html>
     <head>
       <title>Gym Routine</title>
     </head>
     <body>
			
			<h2>Enter your 1rep max in each exercise</h2>
			
			<form action="" method="get">
					Bicep Curl 1repmax: <input type="integer" name="curl"/><br/>
					Concentration Curl 1repmax: <input type="integer" name="conc"/><br/>
					<input type="submit"/>
				</form>
				
				<xsl:for-each select="rss:item">
					<p><xsl:value-of select="rss:title"/></p>
				</xsl:for-each>
				
		 </body>
   </html>
</xsl:template>

<!--<xsl:apply-templates />-->

</xsl:stylesheet>

