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
				<Grid id="6" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" name="roleGrid" connection="hrcon" dataSource="SELECT a.*, b.company_name,
CASE WHEN a.user_status_id = 1 THEN 'ACTIVE'
     WHEN a.user_status_id = 2 THEN 'BLOCKED'
     WHEN a.user_status_id = 3 THEN 'NEW'
     WHEN a.user_status_id = 4 THEN 'INACTIVE'
     ELSE ''
END AS user_status
FROM p_user AS a
LEFT JOIN p_company_client AS b ON a.p_company_client_id = b.p_company_client_id
WHERE upper(user_name) LIKE upper('%{s_keyword}%') 
OR upper(full_name) LIKE upper('%{s_keyword}%')
ORDER BY p_user_id DESC" pageSizeLimit="100" pageSize="False" wizardCaption="Daftar Role" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" wizardGridPagingType="Custom" wizardUseSearch="False" wizardAddNbsp="False" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="ContentroleGrid" editableComponentTypeString="Grid">
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
						<ImageLink id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="editlink" PathID="ContentroleGrideditlink" hrefSource="p_user_form.ccp" linkProperties="{'textSource':'test','textSourceDB':'','hrefSource':'p_user_form.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'p_role_id','parameterName':'p_role_id'},'1':{'sourceType':'DataField','parameterSource':'p_module_id','parameterName':'p_module_id'},'2':{'sourceType':'DataField','parameterSource':'p_user_id','parameterName':'p_user_id'},'length':3,'objectType':'linkParameters'}}"><Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="17" sourceType="DataField" format="yyyy-mm-dd" name="p_user_id" source="p_user_id"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</ImageLink>
						<ImageLink id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="addlink" PathID="ContentroleGridaddlink" linkProperties="{&quot;textSource&quot;:&quot;../images/AddNew.gif&quot;,&quot;textSourceDB&quot;:&quot;&quot;,&quot;hrefSource&quot;:&quot;p_user_form.ccp&quot;,&quot;hrefSourceDB&quot;:&quot;&quot;,&quot;title&quot;:&quot;&quot;,&quot;target&quot;:&quot;&quot;,&quot;name&quot;:&quot;&quot;,&quot;linkParameters&quot;:{&quot;length&quot;:0,&quot;objectType&quot;:&quot;linkParameters&quot;}}" removeParameters="p_user_id" hrefSource="p_user_form.ccp">
							<Components/>
							<Events/>
							<LinkParameters/>
							<Attributes/>
							<Features/>
						</ImageLink>
						<Label id="9" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="full_name" fieldSource="full_name" wizardCaption="Description" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentroleGridfull_name">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="8" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="user_name" fieldSource="user_name" wizardCaption="Is Active" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentroleGriduser_name">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Link id="27" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link2" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="ContentroleGridLink2" wizardUseTemplateBlock="False" linkProperties="{'textSource':'&lt;i title=\'Detail\' class=\'fa fa-bars bigger-160\'&gt;&amp;nbsp;&lt;/i&gt;','textSourceDB':'','hrefSource':'p_user_attribute.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'Expression','parameterSource':'CCAddParam(\'\',\'p_role_id\', 1','parameterName':'t'},'1':{'sourceType':'Expression','parameterSource':'1','parameterName':'t'},'2':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_menu_id&amp;#39;)','parameterName':'t'},'3':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_menu_id&amp;#39;)','parameterName':'t'},'4':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_menu_id&amp;#39;)','parameterName':'t'},'5':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_module_id&amp;#39;)','parameterName':'p_module_id'},'6':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_module_id&amp;#39;)','parameterName':'p_module_id'},'7':{'sourceType':'Expression','parameterSource':'a','parameterName':'a'},'8':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_module_id&amp;#39;)','parameterName':'p_module_id'},'9':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_module_id&amp;#39;)','parameterName':'p_module_id'},'10':{'sourceType':'URL','parameterSource':'idmenulabel','parameterName':'idmenulabel'},'11':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_user_id&amp;#39;)','parameterName':'p_user_id'},'12':{'sourceType':'URL','parameterSource':'idmenulabel','parameterName':'idmenulabel'},'13':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_user_id&amp;#39;)','parameterName':'p_user_id'},'14':{'sourceType':'URL','parameterSource':'idmenulabel','parameterName':'idmenulabel'},'15':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_user_id&amp;#39;)','parameterName':'p_user_id'},'16':{'sourceType':'URL','parameterSource':'idmenulabel','parameterName':'idmenulabel'},'17':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_user_id&amp;#39;)','parameterName':'p_user_id'},'18':{'sourceType':'URL','parameterSource':'idmenulabel','parameterName':'idmenulabel'},'length':19,'objectType':'linkParameters'}}" hrefSource="p_user_attribute.ccp">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="31" sourceType="Expression" name="p_user_id" source="$this-&gt;DataSource-&gt;f('p_user_id')"/>
								<LinkParameter id="47" sourceType="URL" name="idmenulabel" source="idmenulabel"/>
</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
						<Link id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link3" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="ContentroleGridLink3" wizardUseTemplateBlock="False" linkProperties="{'textSource':'&lt;i title=\'Role\' class=\'fa fa-users bigger-160\'&gt;&amp;nbsp;&lt;/i&gt;','textSourceDB':'','hrefSource':'p_user_role.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'Expression','parameterSource':'CCAddParam(\'\',\'p_role_id\', 1','parameterName':'t'},'1':{'sourceType':'Expression','parameterSource':'1','parameterName':'t'},'2':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_menu_id&amp;#39;)','parameterName':'t'},'3':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_menu_id&amp;#39;)','parameterName':'t'},'4':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_menu_id&amp;#39;)','parameterName':'t'},'5':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_module_id&amp;#39;)','parameterName':'p_module_id'},'6':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_module_id&amp;#39;)','parameterName':'p_module_id'},'7':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_module_id&amp;#39;)','parameterName':'p_module_id'},'8':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_module_id&amp;#39;)','parameterName':'p_module_id'},'9':{'sourceType':'DataField','parameterSource':'idmenulabel','parameterName':'idmenulabel'},'10':{'sourceType':'Expression','parameterSource':'$this-&gt;DataSource-&gt;f(&amp;#39;p_user_id&amp;#39;)','parameterName':'p_user_id'},'11':{'sourceType':'DataField','parameterSource':'idmenulabel','parameterName':'idmenulabel'},'length':12,'objectType':'linkParameters'}}" hrefSource="p_user_role.ccp">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="30" sourceType="Expression" format="yyyy-mm-dd" name="p_user_id" source="$this-&gt;DataSource-&gt;f('p_user_id')"/>
								<LinkParameter id="48" sourceType="DataField" name="idmenulabel" source="idmenulabel"/>
</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
						<Label id="42" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="user_status" fieldSource="user_status" wizardCaption="Description" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentroleGriduser_status">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
<Label id="44" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="company_name" fieldSource="company_name" wizardCaption="Description" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentroleGridcompany_name">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
<Label id="46" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="email_address" fieldSource="email_address" wizardCaption="Description" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentroleGridemail_address">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
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
						<SQLParameter id="49" dataType="Text" parameterSource="s_keyword" parameterType="URL" variable="s_keyword"/>
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
		<CodeFile id="Events" language="PHPTemplates" name="p_user_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_user.php" forShow="True" url="p_user.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
