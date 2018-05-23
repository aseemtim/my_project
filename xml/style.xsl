<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:foo="http://www.foo.org/" xmlns:bar="http://www.bar.org">
<xsl:template match="/">
  <html>
  <body>
    <h2>Music</h2>
    <table border="1">
      <tr bgcolor="#9acd32">
        <th>FirstName</th>
        <th>LastName</th>
        <th>Email</th>
      </tr>
      <xsl:for-each select="Music/User">
      <tr>
        <td><xsl:value-of select="Name" /></td>
        <td><xsl:value-of select="Lname" /></td>
        <td><xsl:value-of select="Email" /></td>
      </tr>
      </xsl:for-each>
    </table>
  </body>
  </html>
</xsl:template>
</xsl:stylesheet>