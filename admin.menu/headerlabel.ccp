<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\admin" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="None" wizardThemeVersion="3.0" useDesign="False">
	<Components>
		<Path id="2" sourceType="Table" name="Path_p_menu" connection="hrcon" dataSource="p_menu" catIdField="p_menu_id" catNameField="code" catParField="parent_id" wizardTypeComponent="Path" wizardCaption="List of P Menu " wizardTheme="None" wizardThemeType="File" PathID="Path_p_menu" composition="1">
<Components>
<Label id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="PathBeginLink" fieldSource="code" wizardThemeItem="SorterLink" wizardTheme="None" wizardThemeType="File" hrefSource="headerlabel.ccp" removeParameters="p_menu_id" PathID="Path_p_menuPathBeginLink">
<Components/>
<Events/>
<LinkParameters/>
<Attributes/>
<Features/>
</Label>
<Label id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="PathCategory" fieldSource="code" wizardThemeItem="SorterLink" wizardTheme="None" wizardThemeType="File" hrefSource="headerlabel.ccp" PathID="Path_p_menuPathCategory">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="7" sourceType="DataField" format="yyyy-mm-dd" name="p_menu_id" source="p_menu_id"/>
</LinkParameters>
<Attributes/>
<Features/>
</Label>
<Label id="8" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="CurrentCategory" fieldSource="code" wizardTheme="None" wizardThemeType="File" PathID="Path_p_menuCurrentCategory">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
</Components>
<Events/>
<TableParameters>
<TableParameter id="4" conditionType="Parameter" useIsNull="True" field="p_menu_id" parameterSource="p_menu_id" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<JoinTables>
<JoinTable id="3" tableName="p_menu"/>
</JoinTables>
<JoinLinks/>
<Fields/>
<PKFields/>
<SPParameters/>
<SQLParameters/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Path>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="headerlabel.php" forShow="True" url="headerlabel.php" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events/>
</Page>
