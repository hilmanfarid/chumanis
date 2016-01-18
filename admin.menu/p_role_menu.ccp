<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\admin.menu" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Universal" wizardThemeVersion="3.0" useDesign="False" needGeneration="0" masterPage="../Designs/d01/MasterPage.ccp">
	<Components>
		<Panel id="2" visible="True" generateDiv="False" name="Head" contentPlaceholder="Head">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="3" visible="True" generateDiv="True" name="Content" contentPlaceholder="Content" PathID="Content">
			<Components>
				<Panel id="4" visible="True" generateDiv="False" name="Panel1" PathID="ContentPanel1" features="(assigned)">
					<Components>
						<Grid id="6" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" name="roleGrid" connection="hrcon" dataSource="p_role_menu, p_role, p_menu" orderBy="p_role_menu_id" pageSizeLimit="100" pageSize="False" wizardCaption="Daftar Role" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" wizardGridPagingType="Custom" wizardUseSearch="False" wizardAddNbsp="False" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="ContentPanel1roleGrid">
							<Components>
								<Label id="7" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="code" fieldSource="menu_name" wizardCaption="Code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentPanel1roleGridcode">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="8" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="valid_from" fieldSource="valid_from" wizardCaption="Description" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentPanel1roleGridvalid_from" format="dd-mmm-yyyy">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Navigator id="9" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardImages="Images" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="False" wizardImagesScheme="None">
									<Components/>
									<Events>
										<Event name="BeforeShow" type="Server">
											<Actions>
												<Action actionName="Custom Code" actionCategory="General" id="10"/>
											</Actions>
										</Event>
									</Events>
									<Attributes/>
									<Features/>
								</Navigator>
								<ImageLink id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="editlink" PathID="ContentPanel1roleGrideditlink" hrefSource="p_role_menu_form.ccp" linkProperties="{'textSource':'../images/table.gif','textSourceDB':'','hrefSource':'p_role_menu_form.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'p_role_id','parameterName':'p_role_id'},'1':{'sourceType':'DataField','parameterSource':'p_role_module_id','parameterName':'p_role_module_id'},'2':{'sourceType':'DataField','parameterSource':'p_role_module_id','parameterName':'p_role_module_id'},'3':{'sourceType':'DataField','parameterSource':'p_role_menu_id','parameterName':'p_role_menu_id'},'length':4,'objectType':'linkParameters'}}" removeParameters="p_menu_id">
									<Components/>
									<Events/>
									<LinkParameters>
										<LinkParameter id="12" sourceType="DataField" format="yyyy-mm-dd" name="p_role_menu_id" source="p_role_menu_id"/>
									</LinkParameters>
									<Attributes/>
									<Features/>
								</ImageLink>
								<ImageLink id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="addlink" PathID="ContentPanel1roleGridaddlink" linkProperties="{'textSource':'../images/AddNew.gif','textSourceDB':'','hrefSource':'p_role_menu_form.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="p_role_menu_id;FormFilter" hrefSource="p_role_menu_form.ccp">
									<Components/>
									<Events/>
									<LinkParameters/>
									<Attributes/>
									<Features/>
								</ImageLink>
								<Label id="14" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="role_name" fieldSource="role_name" wizardCaption="Code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentPanel1roleGridrole_name">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="15" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="valid_to" fieldSource="valid_to" wizardCaption="Description" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentPanel1roleGridvalid_to" format="dd-mmm-yyyy">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Hidden id="35" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="p_module_id" fieldSource="p_module_id" wizardCaption="Code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentPanel1roleGridp_module_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Hidden>
							</Components>
							<Events>
								<Event name="BeforeShowRow" type="Server">
									<Actions>
										<Action actionName="Set Row Style" actionCategory="General" id="16" styles="Row;AltRow" name="rowStyle" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<TableParameters>
								<TableParameter id="63" conditionType="Parameter" useIsNull="False" dataType="Float" field="p_role_menu.p_menu_id" logicOperator="And" parameterSource="p_menu_id" parameterType="URL" searchConditionType="Equal"/>
</TableParameters>
							<JoinTables>
								<JoinTable id="58" posHeight="180" posLeft="10" posTop="10" posWidth="125" tableName="p_role_menu"/>
<JoinTable id="59" posHeight="180" posLeft="156" posTop="10" posWidth="115" tableName="p_role"/>
<JoinTable id="60" posHeight="180" posLeft="292" posTop="10" posWidth="115" tableName="p_menu"/>
</JoinTables>
							<JoinLinks>
								<JoinTable2 id="61" conditionType="Equal" fieldLeft="p_role_menu.p_menu_id" fieldRight="p_menu.p_menu_id" joinType="inner" tableLeft="p_role_menu" tableRight="p_menu"/>
<JoinTable2 id="62" conditionType="Equal" fieldLeft="p_role_menu.p_role_id" fieldRight="p_role.p_role_id" joinType="inner" tableLeft="p_role_menu" tableRight="p_role"/>
</JoinLinks>
							<Fields>
								<Field id="64" alias="role_name" fieldName="p_role.code" tableName="p_role"/>
<Field id="65" fieldName="p_role_menu.*" tableName="p_role_menu"/>
<Field id="66" alias="menu_name" fieldName="p_menu.code" tableName="p_menu"/>
</Fields>
							<PKFields/>
							<SPParameters/>
							<SQLParameters/>
							<SecurityGroups/>
							<Attributes/>
							<Features/>
						</Grid>
						<Link id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="ContentPanel1Link1" hrefSource="p_module.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Module','textSourceDB':'','hrefSource':'p_module.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="roleGridPage;p_module_id">
<Components/>
							<Events/>
							<LinkParameters/>
							<Attributes/>
							<Features/>
						</Link>
						<Link id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link2" PathID="ContentPanel1Link2" hrefSource="p_menu.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Menu','textSourceDB':'','hrefSource':'p_menu.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'p_menu_id','parameterName':'p_menu_id'},'1':{'sourceType':'URL','parameterSource':'p_module_id','parameterName':'p_module_id'},'length':2,'objectType':'linkParameters'}}" removeParameters="roleGridPage;p_menu_id">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="48" sourceType="URL" name="p_module_id" source="p_module_id"/>
</LinkParameters>
<Attributes/>
<Features/>
</Link>
</Components>
					<Events/>
					<Attributes/>
					<Features>
						<JTabView id="5" name="JTabView1" category="jQuery">
							<Components/>
							<Events/>
							<TableParameters/>
							<SPParameters/>
							<SQLParameters/>
							<JoinTables/>
							<JoinLinks/>
							<Fields/>
							<Features/>
						</JTabView>
					</Features>
				</Panel>
			</Components>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="p_role_menu_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_role_menu.php" forShow="True" url="p_role_menu.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
