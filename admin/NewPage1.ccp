<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\admin" secured="False" urlType="Relative" isIncluded="True" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="None" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<Path id="2" sourceType="Table" name="Path_p_menu" connection="hrcon" dataSource="p_menu" catIdField="p_menu_id" catNameField="code" catParField="parent_id" wizardTypeComponent="Path" wizardCaption="List of P Menu " wizardTheme="None" wizardThemeType="File" PathID="NewPage1Path_p_menu" composition="1">
			<Components>
				<Link id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="PathBeginLink" fieldSource="code" wizardThemeItem="SorterLink" wizardTheme="None" wizardThemeType="File" hrefSource="NewPage1.ccp" removeParameters="p_menu_id" PathID="NewPage1Path_p_menuPathBeginLink">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="PathCategory" fieldSource="code" wizardThemeItem="SorterLink" wizardTheme="None" wizardThemeType="File" hrefSource="NewPage1.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="7" sourceType="DataField" format="yyyy-mm-dd" name="p_menu_id" source="p_menu_id"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="8" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="CurrentCategory" fieldSource="code" wizardTheme="None" wizardThemeType="File" PathID="NewPage1Path_p_menuCurrentCategory">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="10" conditionType="Parameter" useIsNull="True" dataType="Integer" field="p_menu_id" logicOperator="And" orderNumber="1" parameterSource="idmenulabel" parameterType="URL" searchConditionType="Equal"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="9" posHeight="180" posLeft="10" posTop="10" posWidth="115" tableName="p_menu"/>
</JoinTables>
			<JoinLinks/>
			<Fields>
<Field id="11" fieldName="*"/>
</Fields>
			<PKFields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Path>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="NewPage1.php" forShow="True" url="NewPage1.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
