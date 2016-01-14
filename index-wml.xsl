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
				background-color: #white; 
			}
			
			h2 {
				position: relative;
				top: 5%;
				left: 5%;
				font-size: 20px;
				font-family:Calibri;
				color: dark gray;
			}
			table#t01 {
			
				position: relative;
				top:20%;
				left:5%;
				width: 10%;
				padding: 1px;
				border-top: 1px solid #ddd;
			}
			
			table#t01 td{
				width:5%;
				border-bottom: 1px solid #ddd;
			}
			
			table#t02 {
				position: relative;
				top:100%;
				left:1%;
				width:20%;
				padding: 5px;
				border-bottom: 1px solid #ddd;
			}
			
			table#t02 tr:nth-child(even) {
				background-color: #fff;
			}
			
			table#t02 tr:nth-child(odd) {
			   background-color:#eee;
			}
			
			table#t02 th{
				width:20%;
				padding: 10px;
				background-color: #A5A5A5;
			}
			
			table#t02 td{
				width:20%;
				padding: 5px;
				
			}

			table#t04 {
				position: relative;
				top:100%;
				left:1%;
				width:20%;
				padding: 5px;
				border-bottom: 1px solid #ddd;
			}
			
			table#t04 tr:nth-child(even) {
				background-color: #fff;
			}
			
			table#t04 tr:nth-child(odd) {
			   background-color:#eee;
			}
			
			table#t04 th{
				width:20%;
				padding: 10px;
				background-color: #A5A5A5;
			}
			
			table#t04 td{
				width:20%;
				padding: 5px;
				
			}
			
		</style>
	 <title>Gym Routine Mobile</title>
	 </head>

     <body>
			<h2>Enter your ID (and your bicepsize)</h2>
			
			<form action="" method="get">
			<table id = "t01">
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
						<table id="t02" align = "left" cellspacing = "0" >
							<tr>
								<td colspan = '4' align="left">Bicep curls</td>
							</tr>
							<tr>
							<td align="left">Week: </td>
							<td align="left">Sets: </td>
							<td align="left">Reps: </td>
							<td align="left"> Weight(kg):</td>
							</tr>
							<xsl:for-each select="rss:bic">	
							<tr>
								<td align="right"><xsl:value-of select="rss:week"/></td>
								<td align="right"><xsl:value-of select="rss:set"/></td>
								<td align="right"> <xsl:value-of select="rss:rep"/> </td>
								<td align="right"> <xsl:value-of select="rss:weight"/> </td>
							</tr>
						</xsl:for-each>
						</table>
						<br/>
						<table id="t04" align = "left" cellspacing = "0" >
						<tr>
						<td colspan = '4' align="left">Concentration curls</td>
						</tr>
						<tr>
						<td align="right">Week: </td>
						  <td align="right">Sets: </td>
						  <td align="right">Reps: </td>
						  <td align="right"> Weight(kg): </td>
						</tr>
						<xsl:for-each select="rss:con">
						<tr>
						  <td align="right" valign="bottom"><xsl:value-of select="rss:week2"/></td>
						  <td align="right" valign="bottom"><xsl:value-of select="rss:rep2"/></td>
						  <td align="right" valign="bottom"> <xsl:value-of select="rss:set2"/> </td>
						  <td align="right" valign="bottom"> <xsl:value-of select="rss:weight2"/> </td>
						</tr>
						</xsl:for-each>
					</table>
				<!--</form>-->
		 </body>
   </html>
</xsl:template>
</xsl:stylesheet>

