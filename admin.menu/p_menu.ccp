<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\admin.menu" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="None" wizardThemeVersion="3.0" useDesign="False" needGeneration="0" masterPage="../Designs/d01/MasterPage.ccp">
	<Components>
		<Panel id="28" visible="True" generateDiv="False" name="Head" contentPlaceholder="Head">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="29" visible="True" generateDiv="False" name="Content" contentPlaceholder="Content">
			<Components>
				<Panel id="7" visible="True" generateDiv="True" name="UpdatePanel" PathID="ContentUpdatePanel" features="(assigned)">
					<Components>
						<Grid id="9" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" name="menuGrid" connection="hrcon" dataSource="p_menu" orderBy="listing_no" pageSizeLimit="100" pageSize="False" wizardCaption="Daftar Role" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" wizardGridPagingType="Custom" wizardUseSearch="False" wizardAddNbsp="False" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="ContentUpdatePanelmenuGrid">
							<Components>
								<Label id="11" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="file_name" fieldSource="file_name" wizardCaption="Description" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentUpdatePanelmenuGridfile_name">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Navigator id="12" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardImages="Images" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="False" wizardImagesScheme="None">
									<Components/>
									<Events>
										<Event name="BeforeShow" type="Server">
											<Actions>
												<Action actionName="Custom Code" actionCategory="General" id="13"/>
											</Actions>
										</Event>
									</Events>
									<Attributes/>
									<Features/>
								</Navigator>
								<ImageLink id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="editlink" PathID="ContentUpdatePanelmenuGrideditlink" hrefSource="p_menu_from.ccp" linkProperties="{'textSource':'../images/table.gif','textSourceDB':'','hrefSource':'p_menu_from.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'p_role_id','parameterName':'p_role_id'},'1':{'sourceType':'DataField','parameterSource':'p_role_module_id','parameterName':'p_role_module_id'},'2':{'sourceType':'DataField','parameterSource':'p_role_module_id','parameterName':'p_role_module_id'},'3':{'sourceType':'DataField','parameterSource':'p_menu_id','parameterName':'p_menu_id'},'4':{'sourceType':'DataField','parameterSource':'p_menu_id','parameterName':'p_menu_id'},'5':{'sourceType':'DataField','parameterSource':'p_menu_id','parameterName':'p_menu_id'},'6':{'sourceType':'DataField','parameterSource':'parent_id','parameterName':'parent_id'},'length':7,'objectType':'linkParameters'}}">
									<Components/>
									<Events/>
									<LinkParameters>
										<LinkParameter id="15" sourceType="DataField" format="yyyy-mm-dd" name="p_menu_id" source="p_menu_id"/>
										<LinkParameter id="35" sourceType="DataField" name="parent_id" source="parent_id"/>
									</LinkParameters>
									<Attributes/>
									<Features/>
								</ImageLink>
								<ImageLink id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="addlink" PathID="ContentUpdatePanelmenuGridaddlink" linkProperties="{'textSource':'../images/AddNew.gif','textSourceDB':'','hrefSource':'p_menu_from.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="p_menu_id;FormFilter" hrefSource="p_menu_from.ccp">
									<Components/>
									<Events/>
									<LinkParameters/>
									<Attributes/>
									<Features/>
								</ImageLink>
								<Label id="17" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="is_active" fieldSource="is_active" wizardCaption="Description" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentUpdatePanelmenuGridis_active">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Hidden id="18" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="p_module_id" fieldSource="p_module_id" wizardCaption="Code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentUpdatePanelmenuGridp_module_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Hidden>
								<Link id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link2" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="ContentUpdatePanelmenuGridLink2" wizardUseTemplateBlock="False" linkProperties="{'textSource':'&lt;img border=\'0\' src=\'../Images/inc.gif\' width=\'16\' align=\'middle\' height=\'16\'&gt;','textSourceDB':'','hrefSource':'p_role_menu.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'Expression','parameterSource':'CCAddParam(\'\',\'p_role_id\', 1','parameterName':'t'},'1':{'sourceType':'Expression','parameterSource':'1','parameterName':'t'},'2':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_menu_id&amp;#39;)','parameterName':'t'},'3':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_menu_id&amp;#39;)','parameterName':'t'},'4':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_menu_id&amp;#39;)','parameterName':'t'},'5':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_module_id&amp;#39;)','parameterName':'p_module_id'},'6':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_module_id&amp;#39;)','parameterName':'p_module_id'},'7':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_menu_id&amp;#39;)','parameterName':'p_menu_id'},'8':{'sourceType':'DataField','parameterSource':'p_menu_id','parameterName':'p_menu_id'},'length':9,'objectType':'linkParameters'}}" hrefSource="p_role_menu.ccp">
									<Components/>
									<Events/>
									<LinkParameters>
										<LinkParameter id="20" sourceType="DataField" format="yyyy-mm-dd" name="p_menu_id" source="p_menu_id"/>
									</LinkParameters>
									<Attributes/>
									<Features/>
								</Link>
								<Label id="10" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="code" fieldSource="code" wizardCaption="Code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentUpdatePanelmenuGridcode">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="79" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="listing_no" fieldSource="listing_no" wizardCaption="Code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentUpdatePanelmenuGridlisting_no">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
							</Components>
							<Events>
								<Event name="BeforeShowRow" type="Server">
									<Actions>
										<Action actionName="Set Row Style" actionCategory="General" id="21" styles="Row;AltRow" name="rowStyle" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<TableParameters>
								<TableParameter id="82" conditionType="Parameter" useIsNull="False" dataType="Float" field="p_module_id" logicOperator="And" parameterSource="p_module_id" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="83" conditionType="Parameter" useIsNull="False" dataType="Float" field="parent_id" logicOperator="And" parameterSource="parent_id" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="84" conditionType="Expression" useIsNull="False" dataType="Text" expression="code ILIKE '%&quot;.CCgetFromPost('s_key').&quot;%'" field="code" logicOperator="And" parameterSource="code" parameterType="URL"/>
</TableParameters>
							<JoinTables>
								<JoinTable id="80" posHeight="180" posLeft="10" posTop="10" posWidth="115" tableName="p_menu"/>
</JoinTables>
							<JoinLinks>
								<JoinTable2 id="81" conditionType="Equal" fieldLeft="p_menu.parent_id" fieldRight="p_menu.p_menu_id" joinType="inner" tableLeft="p_menu" tableRight="p_menu"/>
</JoinLinks>
							<Fields>
								<Field id="85" fieldName="*"/>
</Fields>
							<PKFields/>
							<SPParameters/>
							<SQLParameters/>
							<SecurityGroups/>
							<Attributes/>
							<Features/>
						</Grid>
						<Link id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="ContentUpdatePanelLink1" hrefSource="p_module.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Module','textSourceDB':'','hrefSource':'p_module.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="menuGridPage;p_module_id;p_menu_id;parent_id">
							<Components/>
							<Events/>
							<LinkParameters/>
							<Attributes/>
							<Features/>
						</Link>
						<Record id="40" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="p_menu1" searchIds="40" fictitiousConnection="hrcon" fictitiousDataSource="p_menu" wizardCaption="Search  " changedCaptionSearch="False" wizardOrientation="Vertical" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="False" PathID="ContentUpdatePanelp_menu1">
							<Components>
								<TextBox id="42" visible="Yes" fieldSourceType="CodeExpression" dataType="Text" name="s_key" fieldSource="CCgetFromPost('s_key')" wizardIsPassword="False" wizardCaption="Code" caption="Cari" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="ContentUpdatePanelp_menu1s_key">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<Button id="41" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="ContentUpdatePanelp_menu1Button_DoSearch">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Button>
							</Components>
							<Events/>
							<TableParameters/>
							<SPParameters/>
							<SQLParameters/>
							<JoinTables/>
							<JoinLinks/>
							<Fields/>
							<PKFields/>
							<ISPParameters/>
							<ISQLParameters/>
							<IFormElements/>
							<USPParameters/>
							<USQLParameters/>
							<UConditions/>
							<UFormElements/>
							<DSPParameters/>
							<DSQLParameters/>
							<DConditions/>
							<SecurityGroups/>
							<Attributes/>
							<Features/>
						</Record>
					</Components>
					<Events/>
					<Attributes/>
					<Features>
						<JUpdatePanel id="8" enabled="True" childrenAsTriggers="True" name="UpdatePanel1" category="jQuery">
							<Components/>
							<Events/>
							<ControlPoints/>
							<Features/>
						</JUpdatePanel>
					</Features>
				</Panel>
				<Menu id="2" secured="False" sourceType="Table" returnValueType="Number" connection="hrcon" name="Menu1" menuType="VerticalTree" dataSource="p_menu" idField="p_menu_id" parentIdField="parent_id" menuSourceType="DataSource" PathID="ContentMenu1">
					<Components>
						<Link id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Database" urlType="Relative" preserveParameters="GET" name="ItemLink" hrefSource="file_name" fieldSource="code" PathID="ContentMenu1ItemLink">
							<Components/>
							<Events/>
							<LinkParameters/>
							<Attributes/>
							<Features/>
						</Link>
					</Components>
					<Events>
						<Event name="BeforeShowRow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="26" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="38" conditionType="Parameter" useIsNull="False" dataType="Float" field="p_module_id" logicOperator="And" parameterSource="p_module_id" parameterType="URL" searchConditionType="Equal"/>
					</TableParameters>
					<JoinTables>
						<JoinTable id="37" posHeight="180" posLeft="10" posTop="10" posWidth="115" tableName="p_menu"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="39" fieldName="*"/>
					</Fields>
					<PKFields/>
					<SPParameters/>
					<SQLParameters/>
					<SecurityGroups/>
					<Attributes>
						<Attribute id="4" name="Target" sourceType="Expression" source="&quot;&quot;"/>
						<Attribute id="5" name="Title" sourceType="DataField" source="tooltip_text"/>
					</Attributes>
					<MenuItems/>
					<Features/>
				</Menu>
				<IncludePage id="72" name="NewPage1" PathID="ContentNewPage1" page="../admin/NewPage1.ccp">
					<Components/>
					<Events/>
					<Features/>
				</IncludePage>
			</Components>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_menu.php" forShow="True" url="p_menu.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_menu_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
