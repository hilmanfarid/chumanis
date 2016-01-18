<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\admin.menu" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0" masterPage="../Designs/d01/MasterPage.ccp">
	<Components>
		<Panel id="37" visible="True" generateDiv="False" name="Head" contentPlaceholder="Head">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="38" visible="True" generateDiv="False" name="Content" contentPlaceholder="Content">
			<Components>
				<Grid id="6" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" name="roleGrid" connection="hrcon" dataSource="SELECT * FROM p_module WHERE upper(code) LIKE upper('%{s_keyword}%') OR description LIKE upper('%{s_keyword}%') order by listing_no" pageSizeLimit="100" pageSize="False" wizardCaption="Daftar Role" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" wizardGridPagingType="Custom" wizardUseSearch="False" wizardAddNbsp="False" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="ContentroleGrid" editableComponentTypeString="Grid">
					<Components>
						<Navigator id="14" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardImages="Images" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="False" wizardImagesScheme="None">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="15"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</Navigator>
						<ImageLink id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="editlink" PathID="ContentroleGrideditlink" hrefSource="p_module_form.ccp" linkProperties="{'textSource':'../images/table.gif','textSourceDB':'','hrefSource':'p_module_form.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'p_role_id','parameterName':'p_role_id'},'1':{'sourceType':'DataField','parameterSource':'p_module_id','parameterName':'p_module_id'},'length':2,'objectType':'linkParameters'}}"><Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="17" sourceType="DataField" format="yyyy-mm-dd" name="p_module_id" source="p_module_id"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</ImageLink>
						<ImageLink id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="addlink" PathID="ContentroleGridaddlink" linkProperties="{'textSource':'../images/AddNew.gif','textSourceDB':'','hrefSource':'p_module_form.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="p_module_id" hrefSource="p_module_form.ccp">
							<Components/>
							<Events/>
							<LinkParameters/>
							<Attributes/>
							<Features/>
						</ImageLink>
						<Label id="9" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="description" fieldSource="description" wizardCaption="Description" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentroleGriddescription">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="8" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="code" fieldSource="code" wizardCaption="Is Active" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentroleGridcode">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Link id="27" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link2" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="ContentroleGridLink2" wizardUseTemplateBlock="False" linkProperties="{'textSource':'&lt;img border=\'0\' src=\'../Images/inc.gif\' width=\'16\' align=\'middle\' height=\'16\'&gt;','textSourceDB':'','hrefSource':'p_menu.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'Expression','parameterSource':'CCAddParam(\'\',\'p_role_id\', 1','parameterName':'t'},'1':{'sourceType':'Expression','parameterSource':'1','parameterName':'t'},'2':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_menu_id&amp;#39;)','parameterName':'t'},'3':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_menu_id&amp;#39;)','parameterName':'t'},'4':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_menu_id&amp;#39;)','parameterName':'t'},'5':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_module_id&amp;#39;)','parameterName':'p_module_id'},'6':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_module_id&amp;#39;)','parameterName':'p_module_id'},'7':{'sourceType':'Expression','parameterSource':'a','parameterName':'a'},'8':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_module_id&amp;#39;)','parameterName':'p_module_id'},'length':9,'objectType':'linkParameters'}}" hrefSource="p_menu.ccp">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="31" sourceType="Expression" name="p_module_id" source="$this-&gt;DataSource-&gt;f('p_module_id')"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
						<Link id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link3" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="ContentroleGridLink3" wizardUseTemplateBlock="False" linkProperties="{'textSource':'&lt;img border=\'0\' src=\'../Images/inc.gif\' width=\'16\' align=\'middle\' height=\'16\'&gt;','textSourceDB':'','hrefSource':'p_role_module.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'Expression','parameterSource':'CCAddParam(\'\',\'p_role_id\', 1','parameterName':'t'},'1':{'sourceType':'Expression','parameterSource':'1','parameterName':'t'},'2':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_menu_id&amp;#39;)','parameterName':'t'},'3':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_menu_id&amp;#39;)','parameterName':'t'},'4':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_menu_id&amp;#39;)','parameterName':'t'},'5':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_module_id&amp;#39;)','parameterName':'p_module_id'},'6':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_module_id&amp;#39;)','parameterName':'p_module_id'},'7':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_module_id&amp;#39;)','parameterName':'p_module_id'},'length':8,'objectType':'linkParameters'}}" hrefSource="p_role_module.ccp">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="30" sourceType="Expression" format="yyyy-mm-dd" name="p_module_id" source="$this-&gt;DataSource-&gt;f('p_module_id')"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
					</Components>
					<Events>
						<Event name="BeforeShowRow" type="Server">
							<Actions>
								<Action actionName="Set Row Style" actionCategory="General" id="20" styles="Row;AltRow" name="rowStyle" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters/>
					<JoinTables>
					</JoinTables>
					<JoinLinks/>
					<Fields>
					</Fields>
					<PKFields/>
					<SPParameters/>
					<SQLParameters>
						<SQLParameter id="41" dataType="Text" parameterSource="s_keyword" parameterType="URL" variable="s_keyword"/>
					</SQLParameters>
					<SecurityGroups/>
					<Attributes/>
					<Features/>
				</Grid>
				<Record id="33" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="p_module1" searchIds="33" fictitiousConnection="hrcon" fictitiousDataSource="p_module" wizardCaption="Search  " changedCaptionSearch="False" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="Or" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="False" PathID="Contentp_module1">
					<Components>
						<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" fieldSource="p_module_id,code,listing_no,is_active,module_image,tooltip_text,description,creation_date,created_by,updated_date,updated_by" wizardIsPassword="False" wizardCaption="Keyword" caption="Keyword" required="False" unique="False" wizardSize="12" wizardMaxLength="12" PathID="Contentp_module1s_keyword">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<Button id="34" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="Contentp_module1Button_DoSearch">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<Hidden id="40" fieldSourceType="DBColumn" dataType="Text" name="idmenulabel" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="Contentp_module1idmenulabel">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
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
				<Panel id="4" visible="True" generateDiv="False" name="Panel1" PathID="ContentPanel1" features="(assigned)">
					<Components/>
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
				<IncludePage id="39" name="NewPage1" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="ContentNewPage1" page="../admin/NewPage1.ccp">
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
		<CodeFile id="Events" language="PHPTemplates" name="p_module_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_module.php" forShow="True" url="p_module.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
