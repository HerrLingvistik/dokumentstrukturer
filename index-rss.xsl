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
		
	   	 <style>
			body {
				background-color: #white; 
			}
			
			h2 {
				color: dark gray;
			}
			
			table#t01 {
			
				position: fixed;
				top:80px;
				left:50px;
				
				width: 20%;
				padding: 1px;
				border-top: 1px solid #ddd;
			}
			
			table#t01 td{
				width:50%;
				border-bottom: 1px solid #ddd;
			}
			
			table#t03 {
				position: fixed;
				top:180px;
				left:50px;
				
				width: 10%;
				border-top: 1px solid #ddd;
				padding: 1px;
				
			}
			table#t03 td{
				width:50%;
				border-bottom: 1px solid #ddd;
			}
			
			table#t02 {
				position: relative;
				top:100%;
				left:30%;
				
				width:60%;
				padding: 10px;
				border-bottom: 1px solid #ddd;
			}
			
			table#t02 tr:nth-child(even) {
				background-color: #fff;
			}
			
			table#t02 tr:nth-child(odd) {
			   background-color:#eee;
			}
			
			table#t02 th{
				width:80%;
				padding: 10px;
				background-color: #A5A5A5;
			}
			
			table#t02 td{
				width:80%;
				padding: 10px;
				
			}

			table#t04 {
				position: relative;
				top:100%;
				left:30%;
				
				width:60%;
				padding: 10px;
				border-bottom: 1px solid #ddd;
			}
			
			table#t04 tr:nth-child(even) {
				background-color: #fff;
			}
			
			table#t04 tr:nth-child(odd) {
			   background-color:#eee;
			}
			
			table#t04 th{
				width:80%;
				padding: 10px;
				background-color: #A5A5A5;
			}
			
			table#t04 td{
				width:80%;
				padding: 10px;
				
			}
			
			
			input {
				width: 120px;
			}
			
			
		</style>
	 <title>Gym Routine</title>
	 </head>

     <body>
			<h2>Enter your ONErep max in each exercise</h2>
			
			<form action="" method="get">
			<table id="t01" align="left">
				<tr>
				  <td align="left">ID:</td>
				  <td align="left"><input type="integer" id="id" name="id" align="right" /></td>
				</tr>
				<tr>
				  <td align="left">Bicep Size(cm):</td>
				  <td align="left"><input type="integer" name="size" align="right" /></td>
				</tr>
				<tr>
				  <td align="left">Calculate:</td>
				  <td align="left"><input type="submit" value="Let's GO" /></td>
				</tr>
				
			</table>
			</form>
			<form action="" method="get">
			<table id="t03" align="left">
			<tr>
					<td colspan="1" height="20" align="left" valign="bottom">User:</td>
					<xsl:for-each select="rss:bic">	
					<xsl:if test="position()=1"> 
					<td colspan="4" height="20" align="left" valign="bottom"> <xsl:value-of select="rss:id1"/> </td>
					</xsl:if>
					</xsl:for-each>
			</tr>
			</table>
			</form>
			
<!--

					ID: <input type="integer" name="id"/><br/>
					Bicep Size: <input type="integer" name="size"/><br/>
					<input type="submit" value="Update Schedule"/>

				</form>
>>>>>>> strut-->
				
				<form action="" method="get">
					<table id="t02" align="left">
						<tr>
						  <th height="40" align="left" valign="bottom"> Routine: </th>
						  <th height="40" align="left" valign="bottom"> Week: </th>
						  <th height="40" align="left" valign="bottom"> Sets: </th>
						  <th height="40" align="left" valign="bottom"> Reps: </th>
						  <th height="40" align="left" valign="bottom"> Weight(kg): </th>
						</tr>
						<xsl:for-each select="rss:bic">	
						<tr>
						  <td align="left"> Bicep curls </td>
						  <td align="right"><xsl:value-of select="rss:week"/></td>
						  <td align="right"><xsl:value-of select="rss:set"/></td>
						  <td align="right"> <xsl:value-of select="rss:rep"/> </td>
						  <td align="right"> <xsl:value-of select="rss:weight"/> </td>
						</tr>
						</xsl:for-each>
						</table>
				</form>
				<form action="" method="get">
					<table id="t04">
						<tr>
						  <th height="40" align="left" valign="bottom"> Routine: </th>
						  <th height="40" align="left" valign="bottom"> Week: </th>
						  <th height="40" align="left" valign="bottom"> Sets: </th>
						  <th height="40" align="left" valign="bottom"> Reps: </th>
						  <th height="40" align="left" valign="bottom"> Weight(kg): </th>
						</tr>
						<xsl:for-each select="rss:con">
						<tr>
						  <td align="left"> Concentration curls </td>
						  <td align="right"><xsl:value-of select="rss:week2"/></td>
						  <td align="right"><xsl:value-of select="rss:rep2"/></td>
						  <td align="right"> <xsl:value-of select="rss:set2"/> </td>
						  <td align="right"> <xsl:value-of select="rss:weight2"/> </td>
						</tr>
						</xsl:for-each>
					</table>
				</form>
		 </body>
   </html>
</xsl:template>
</xsl:stylesheet>

