<?xml version="1.0" encoding="utf-8"?>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	
    <xsl:output method="html" version="5.0" encoding="utf-8" indent="yes"/>
	
	<xsl:template match="articulos">

	<html lang="es">
	<head>
    <meta charset="UTF-8"/>
	<meta name="Noticias"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>501px - Noticias</title>
    <link rel="stylesheet" type="text/css" href="noticias.css" />
	</head>
        
	<body>
        
    <div><h1>501px</h1></div>
	
    <nav>
        <ul>
        <li><a href="../index.html">Bienvenido</a></li>
        <li class="selected"><a href="../Noticias/noticias.xml">Noticias</a></li>
        <li><a href="../Mapa/mapa.html">Mapa y tiempo</a></li>
        <li><a href="../Busqueda/busqueda.html">Búsqueda de fotos</a></li>
        <li><a href="../BBDD/bbdd.html">Base de datos</a></li>
		<li><a href="../Juego/juego.html">Juego</a></li>
        <li><a href="../About/about.html">Autor</a></li>
        </ul>
    </nav>
	
	<xsl:apply-templates/>
	
    <footer>
      <p>
            <a href="https://validator.w3.org/check?uri=referer">
                <img src="https://www.w3.org/html/logo/badge/html5-badge-h-solo.png"
                alt="HTML5 Válido" title="HTML5 Válido" height="64" width="63" />
            </a>
        
            <a href="http://jigsaw.w3.org/css-validator/check/referer">
                <img style="border:0;width:88px;height:31px"
                    src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
                    alt="¡CSS Válido!" />
            </a>
        </p>
        
    </footer>
        
	</body>
	</html>
	</xsl:template>
	
    <xsl:template match="articulo">
		<xsl:apply-templates select="titulo"/>
        <xsl:apply-templates select="medio"/>
		<xsl:apply-templates select="tipo"/>
        <xsl:apply-templates select="palabrasClave"/>
		<xsl:apply-templates select="resumen"/>
    </xsl:template>
	
	<xsl:template match="titulo">
	<h2> <xsl:value-of select="."/> </h2>
	</xsl:template>
	
	<xsl:template match="medio">
	<h3><xsl:value-of select="."/></h3>
    <xsl:element name="a">
        <xsl:attribute name="href">
            <xsl:value-of select="./@enlace"/>
        </xsl:attribute>
        Enlace a la noticia
    </xsl:element>
	</xsl:template>

    <xsl:template match="tipo">
	<p>Tipo: <xsl:value-of select="."/></p>
	</xsl:template>
    
    <xsl:template match="palabrasClave">
	<p> Palabras clave: <xsl:value-of select="."/> </p>
	</xsl:template>
	
	<xsl:template match="resumen">
	<p> <xsl:value-of select="."/> </p>
	</xsl:template>
    
</xsl:stylesheet>
