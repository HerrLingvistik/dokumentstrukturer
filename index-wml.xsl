<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                xmlns:rss="http://purl.org/rss/1.0/"
                xmlns:dc="http://purl.org/dc/elements/1.1/"
                xmlns:syn="http://purl.org/rss/1.0/modules/syndication/"
                xmlns="http://www.w3.org/1999/xhtml"
								xmlns:fo="http://www.w3.org/1999/XSL/Format"
                version="1.0">
								
<xsl:output indent="yes"/>
<xsl:template match="rdf:RDF">
   <html>
     <head>
		
	   	 <style>
			body {
				background-color: #838B8B; 
				}
			h2 {
				color: red;
			}

			table {
			  color: green;
			}
		</style>
	 <title>Gym Routine Mobile</title>
	 </head>

     <body>
			<h2>Enter your ONErep max in each exercise</h2>
			
			<form action="" method="get">
			<table>
				<tr>
				  <td align="left">ID:</td>
				  <td align="left"><input type="integer" name="id" align="right" /></td>
				</tr>
				<tr>
				  <td align="left">Bicep Size(cm):</td>
				  <td align="left"><input type="integer" name="size" align="right" /></td>
				</tr>
				<tr>
				  <td align="left">Calculate:</td>
				  <td align="left"><input type="submit"/></td>
				</tr>
			</table>

			</form>
			
		
				
				
<!--

					ID: <input type="integer" name="id"/><br/>
					Bicep Size: <input type="integer" name="size"/><br/>
					<input type="submit" value="Update Schedule"/>

				</form>
>>>>>>> strut-->
				
				<!--<form action="" method="get">-->
					<table cellspacing = "0" >
						<tr>
						  <td align="left">Routine: </td>
						</tr>
						<tr>
						<td colspan = '4' align="left">Bicep curls</td>
						</tr>
						<td align="left">Week: </td>
						<td align="left">Sets: </td>
						<td align="left">Reps: </td>
						<td align="left"> Weight(kg):</td>
						<xsl:for-each select="rss:bic">	
						<tr>
						  <td align="right"><xsl:value-of select="rss:id"/></td>
						  <td align="right"><xsl:value-of select="rss:set"/></td>
						  <td align="right"> <xsl:value-of select="rss:rep"/> </td>
						  <td align="right"> <xsl:value-of select="rss:weight"/> </td>
						</tr>
						</xsl:for-each>
						<tr>
						<td colspan = '4' align="left">Concentration curls</td>
						</tr>
						<td align="left">Week: </td>
						  <td align="left">Sets: </td>
						  <td align="left">Reps: </td>
						  <td align="left"> Weight(kg): </td>
						<xsl:for-each select="rss:con">
						<tr>
						  <td align="right"><xsl:value-of select="rss:id2"/></td>
						  <td align="right"><xsl:value-of select="rss:rep2"/></td>
						  <td align="right"> <xsl:value-of select="rss:set2"/> </td>
						  <td align="right"> <xsl:value-of select="rss:weight2"/> </td>
						</tr>
						</xsl:for-each>
					</table>
				<!--</form>-->
		 </body>
   </html>
</xsl:template>
</xsl:stylesheet>

