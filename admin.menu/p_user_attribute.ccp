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
						<Grid id="6" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" name="roleGrid" connection="hrcon" dataSource="SELECT a.*, b.code AS attribut_type
FROM p_user_attribute AS a
LEFT JOIN p_user_attribute_type AS b ON a.p_user_attribute_type_id = b.p_user_attribute_type_id
WHERE a.p_user_id = {p_user_id}
AND (
upper(a.user_attribute_value) LIKE upper('%{s_keyword}%') 
OR upper(a.description) LIKE upper('%{s_keyword}%')
)" pageSizeLimit="100" pageSize="False" wizardCaption="Daftar Role" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" wizardGridPagingType="Custom" wizardUseSearch="False" wizardAddNbsp="False" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="ContentPanel1roleGrid">
							<Components>
								<Label id="7" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="user_attribute_value" fieldSource="user_attribute_value" wizardCaption="Code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentPanel1roleGriduser_attribute_value">
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
								<ImageLink id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="editlink" PathID="ContentPanel1roleGrideditlink" hrefSource="p_user_attribute_form.ccp" linkProperties="{'textSource':' ','textSourceDB':'','hrefSource':'p_user_attribute_form.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'p_role_id','parameterName':'p_role_id'},'1':{'sourceType':'DataField','parameterSource':'p_role_module_id','parameterName':'p_role_module_id'},'2':{'sourceType':'DataField','parameterSource':'p_role_module_id','parameterName':'p_role_module_id'},'3':{'sourceType':'DataField','parameterSource':'p_role_module_id','parameterName':'p_role_module_id'},'4':{'sourceType':'DataField','parameterSource':'p_user_attribute_id','parameterName':'p_user_attribute_id'},'length':5,'objectType':'linkParameters'}}">
									<Components/>
									<Events/>
									<LinkParameters>
										<LinkParameter id="59" sourceType="DataField" name="p_user_attribute_id" source="p_user_attribute_id"/>
									</LinkParameters>
									<Attributes/>
									<Features/>
								</ImageLink>
								<ImageLink id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="addlink" PathID="ContentPanel1roleGridaddlink" linkProperties="{'textSource':'../images/AddNew.gif','textSourceDB':'','hrefSource':'p_user_attribute_form.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'p_user_id','parameterName':'p_user_id'},'length':1,'objectType':'linkParameters'}}" hrefSource="p_user_attribute_form.ccp" removeParameters="p_user_attribute_id">
									<Components/>
									<Events/>
									<LinkParameters>
										<LinkParameter id="60" sourceType="DataField" name="p_user_id" source="p_user_id"/>
									</LinkParameters>
									<Attributes/>
									<Features/>
								</ImageLink>
								<Label id="14" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="attribut_type" fieldSource="attribut_type" wizardCaption="Code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentPanel1roleGridattribut_type">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="54" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="description" fieldSource="description" wizardCaption="Code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentPanel1roleGriddescription">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="55" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="valid_from" wizardCaption="Code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentPanel1roleGridvalid_from" fieldSource="valid_from">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="56" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="valid_to" wizardCaption="Code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentPanel1roleGridvalid_to" fieldSource="valid_to">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
							</Components>
							<Events>
								<Event name="BeforeShowRow" type="Server">
									<Actions>
										<Action actionName="Set Row Style" actionCategory="General" id="16" styles="Row;AltRow" name="rowStyle" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<TableParameters>
							</TableParameters>
							<JoinTables>
							</JoinTables>
							<JoinLinks>
							</JoinLinks>
							<Fields>
							</Fields>
							<PKFields/>
							<SPParameters/>
							<SQLParameters>
								<SQLParameter id="57" dataType="Float" defaultValue="0" parameterSource="p_user_id" parameterType="URL" variable="p_user_id"/>
								<SQLParameter id="58" dataType="Text" parameterSource="s_keyword" parameterType="URL" variable="s_keyword"/>
							</SQLParameters>
							<SecurityGroups/>
							<Attributes/>
							<Features/>
						</Grid>
						<Link id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="ContentPanel1Link1" hrefSource="p_user.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'User','textSourceDB':'','hrefSource':'p_user.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="p_user_attribute_id;s_keyword">
<Components/>
							<Events/>
							<LinkParameters/>
							<Attributes/>
							<Features/>
						</Link>
						<Record id="33" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="p_module1" searchIds="33" fictitiousConnection="hrcon" fictitiousDataSource="p_module" wizardCaption="Search  " changedCaptionSearch="False" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="Or" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="False" PathID="ContentPanel1p_module1">
							<Components>
								<TextBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" fieldSource="p_module_id,code,listing_no,is_active,module_image,tooltip_text,description,creation_date,created_by,updated_date,updated_by" wizardIsPassword="False" wizardCaption="Keyword" caption="Keyword" required="False" unique="False" wizardSize="12" wizardMaxLength="12" PathID="ContentPanel1p_module1s_keyword">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<Button id="34" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="ContentPanel1p_module1Button_DoSearch">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Button>
								<TextBox id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="idmenulabel" wizardIsPassword="False" wizardCaption="Keyword" caption="Keyword" required="False" unique="False" wizardSize="12" wizardMaxLength="12" PathID="ContentPanel1p_module1idmenulabel">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="p_user_id" wizardIsPassword="False" wizardCaption="Keyword" caption="Keyword" required="False" unique="False" wizardSize="12" wizardMaxLength="12" PathID="ContentPanel1p_module1p_user_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
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
				<IncludePage id="37" name="NewPage1" PathID="ContentNewPage1" page="../admin/NewPage1.ccp">
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
		<CodeFile id="Events" language="PHPTemplates" name="p_user_attribute_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_user_attribute.php" forShow="True" url="p_user_attribute.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
