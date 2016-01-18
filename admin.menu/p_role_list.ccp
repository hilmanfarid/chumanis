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
				<Grid id="6" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" name="roleGrid" connection="hrcon" dataSource="select * from f_list_p_role (null, '{s_keyword}')" pageSizeLimit="100" pageSize="False" wizardCaption="Daftar Role" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" wizardGridPagingType="Custom" wizardUseSearch="False" wizardAddNbsp="False" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="ContentroleGrid" editableComponentTypeString="Grid">
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
						<ImageLink id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="editlink" PathID="ContentroleGrideditlink" hrefSource="p_role_maint.ccp" linkProperties="{'textSource':' ','textSourceDB':'','hrefSource':'p_role_maint.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'p_role_id','parameterName':'p_role_id'},'1':{'sourceType':'DataField','parameterSource':'p_module_id','parameterName':'p_module_id'},'length':6,'objectType':'linkParameters','2':{'sourceType':'DataField','parameterSource':'p_role_id','parameterName':'p_role_id'},'3':{'sourceType':'DataField','parameterSource':'p_role_id','parameterName':'p_role_id'},'4':{'sourceType':'DataField','parameterSource':'p_role_id','parameterName':'p_role_id'},'5':{'sourceType':'DataField','parameterSource':'code','parameterName':'code'}}}" removeParameters="code">
<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="17" sourceType="DataField" format="yyyy-mm-dd" name="p_role_id" source="p_role_id"/>
								<LinkParameter id="88" sourceType="DataField" name="code" source="code"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</ImageLink>
						<ImageLink id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="addlink" PathID="ContentroleGridaddlink" linkProperties="{'textSource':'../images/AddNew.gif','textSourceDB':'','hrefSource':'p_role_maint.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="p_role_id" hrefSource="p_role_maint.ccp">
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
						<Label id="82" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="valid_from" fieldSource="valid_from" wizardCaption="Is Active" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentroleGridvalid_from" format="dd-mmm-yyyy">
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
						<Label id="83" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="listing_no" fieldSource="listing_no" wizardCaption="Is Active" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentroleGridlisting_no">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="84" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="listing_no" fieldSource="listing_no" wizardCaption="Is Active" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentroleGridlisting_no">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="85" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="valid_to" fieldSource="valid_to" wizardCaption="Is Active" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ContentroleGridvalid_to" format="dd-mmm-yyyy">
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
						<SQLParameter id="81" dataType="Text" parameterSource="s_keyword" parameterType="URL" variable="s_keyword"/>
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
						<TextBox id="87" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="idmenulabel" wizardIsPassword="False" wizardCaption="Keyword" caption="Keyword" required="False" unique="False" wizardSize="12" wizardMaxLength="12" PathID="Contentp_module1idmenulabel">
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
				<IncludePage id="86" name="NewPage1" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="ContentNewPage1" page="../admin/NewPage1.ccp">
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
		<CodeFile id="Events" language="PHPTemplates" name="p_role_list_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_role_list.php" forShow="True" url="p_role_list.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
