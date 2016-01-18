<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\admin" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" useDesign="True" masterPage="{CCS_PathToMasterPage}/MasterPage.ccp" wizardTheme="None" wizardThemeVersion="3.0" needGeneration="0" accessDeniedPage="login.ccp">
	<Components>
		<Panel id="2" visible="True" generateDiv="False" name="Head" contentPlaceholder="Head">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="3" visible="True" generateDiv="False" name="Content" contentPlaceholder="Content">
			<Components>
				<Panel id="7" visible="True" generateDiv="False" name="Panel1" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="ContentPanel1">
					<Components>
						<Grid id="9" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" name="p_client" connection="hrcon" dataSource="p_client" pageSizeLimit="100" pageSize="True" wizardCaption="{res:p_client_GridForm}" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" wizardGridPagingType="Simple" wizardUseSearch="True" wizardAddNbsp="True" gridTotalRecords="True" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="True" addTemplatePanel="False" changedCaptionGrid="False" gridExtendedHTML="False" PathID="ContentPanel1p_client" composition="6" isParent="True">
							<Components>
								<Label id="11" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="p_client_TotalRecords" wizardUseTemplateBlock="False" PathID="ContentPanel1p_clientp_client_TotalRecords">
									<Components/>
									<Events>
										<Event name="BeforeShow" type="Server">
											<Actions>
												<Action actionName="Retrieve number of records" actionCategory="Database" id="12"/>
											</Actions>
										</Event>
									</Events>
									<Attributes/>
									<Features/>
								</Label>
								<ImageLink id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Float" hrefType="Page" preserveParameters="GET" name="p_client_id" fieldSource="p_client_id" wizardCaption="{res:p_client_id}" wizardIsPassword="False" wizardUseTemplateBlock="False" hrefSource="p_client_list.ccp" linkProperties="{'textSource':'Images/to_down_black.gif','textSourceDB':'p_client_id','hrefSource':'p_client_list.ccp','hrefSourceDB':'p_client_id','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'p_client_id','parameterName':'p_client_id'},'length':1,'objectType':'linkParameters'}}" wizardAddNbsp="True" PathID="ContentPanel1p_clientp_client_id" urlType="Relative">
									<Components/>
									<Events/>
									<LinkParameters>
										<LinkParameter id="70" sourceType="DataField" name="p_client_id" source="p_client_id"/>
									</LinkParameters>
									<Attributes/>
									<Features/>
								</ImageLink>
								<Label id="14" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="code" fieldSource="code" wizardCaption="{res:code}" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="ContentPanel1p_clientcode">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="15" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="client_name" fieldSource="client_name" wizardCaption="{res:client_name}" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="ContentPanel1p_clientclient_name">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="16" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="description" fieldSource="description" wizardCaption="{res:description}" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="ContentPanel1p_clientdescription">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="17" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="creation_date" fieldSource="creation_date" wizardCaption="{res:creation_date}" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="ContentPanel1p_clientcreation_date">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="18" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="created_by" fieldSource="created_by" wizardCaption="{res:created_by}" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="ContentPanel1p_clientcreated_by">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="19" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="updated_date" fieldSource="updated_date" wizardCaption="{res:updated_date}" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="ContentPanel1p_clientupdated_date">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="updated_by" fieldSource="updated_by" wizardCaption="{res:updated_by}" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="ContentPanel1p_clientupdated_by">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Navigator id="21" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardPageSize="True" wizardImagesScheme="None">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Navigator>
								<ImageLink id="27" visible="Yes" fieldSourceType="DBColumn" dataType="Float" hrefType="Page" preserveParameters="GET" name="p_client_id_edit" fieldSource="p_client_id" wizardCaption="{res:p_client_id}" wizardIsPassword="False" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Images/edit_small.png','textSourceDB':'p_client_id','hrefSource':'p_client_main.ccp','hrefSourceDB':'p_client_id','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'p_client_id','parameterName':'p_client_id'},'length':1,'objectType':'linkParameters'}}" wizardAddNbsp="True" PathID="ContentPanel1p_clientp_client_id_edit" urlType="Relative" hrefSource="p_client_main.ccp">
									<Components/>
									<Events/>
									<LinkParameters>
										<LinkParameter id="28" sourceType="DataField" name="p_client_id" source="p_client_id"/>
									</LinkParameters>
									<Attributes/>
									<Features/>
								</ImageLink>
								<ImageLink id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink1" PathID="ContentPanel1p_clientImageLink1" hrefSource="p_client_main.ccp" linkProperties="{'textSource':'Images/add.png','textSourceDB':'','hrefSource':'p_client_main.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="p_client_id">
									<Components/>
									<Events/>
									<LinkParameters/>
									<Attributes/>
									<Features/>
								</ImageLink>
							</Components>
							<Events>
								<Event name="BeforeBuildSelect" type="Server">
									<Actions>
										<Action actionName="Advanced Search" actionCategory="General" id="26" searchForm="p_clientSearch" searchConditions="searchConditions" searchControl="s_keyword" searchDBFields="code,client_name,description"/>
									</Actions>
								</Event>
							</Events>
							<TableParameters/>
							<JoinTables>
								<JoinTable id="10" tableName="p_client"/>
							</JoinTables>
							<JoinLinks/>
							<Fields/>
							<PKFields/>
							<SPParameters/>
							<SQLParameters/>
							<SecurityGroups/>
							<Attributes/>
							<Features/>
						</Grid>
						<Record id="22" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="p_clientSearch" searchIds="22" fictitiousConnection="chumanis" wizardCaption="{res:Search_Form}" wizardOrientation="Vertical" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="Advanced" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="True" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardType="Grid" returnPage="p_client_list.ccp" PathID="ContentPanel1p_clientSearch" composition="6" connection="hrcon">
							<Components>
								<Button id="23" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="ContentPanel1p_clientSearchButton_DoSearch">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Button>
								<TextBox id="24" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" fieldSource="code,client_name,description" wizardIsPassword="False" wizardCaption="{res:CCS_Filter}" caption="{res:CCS_Filter}" required="False" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentPanel1p_clientSearchs_keyword">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<ListBox id="25" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="searchConditions" dataSource="1;{res:CCS_AdvSearchAnyOfWords};2;{res:CCS_AdvSearchAllWords};3;{res:CCS_AdvSearchExactPhrase}" wizardCaption="{res:CCS_AdvSearchConditionsCaption}" PathID="ContentPanel1p_clientSearchsearchConditions">
									<Components/>
									<Events/>
									<TableParameters/>
									<SPParameters/>
									<SQLParameters/>
									<JoinTables/>
									<JoinLinks/>
									<Fields/>
									<PKFields/>
									<Attributes/>
									<Features/>
								</ListBox>
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
					<Features/>
				</Panel>
				<Panel id="8" visible="True" generateDiv="False" name="Panel2" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="ContentPanel2">
					<Components>
						<EditableGrid id="30" urlType="Relative" secured="False" emptyRows="1" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" sourceType="Table" defaultPageSize="10" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="p_company_client" connection="hrcon" dataSource="p_company_client" pageSizeLimit="100" wizardGridPageSize="True" wizardUseSearch="False" allowCancel="True" wizardSubmitConfirmation="True" wizardCaption="{res:p_company_client_EditableGridForm}" wizardGridType="Tabular" wizardAltRecord="False" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" wizardGridKey="p_company_client_id" wizardGridPaging="Simple" wizardAddNbsp="False" wizardTotalRecords="False" wizardButtonsType="button" changedCaptionEditableGrid="False" wizardUseInterVariables="True" pkIsAutoincrement="True" wizardType="EditableGrid" wizardThemeApplyTo="Page" addTemplatePanel="False" PathID="ContentPanel2p_company_client" deleteControl="CheckBox_Delete" parameterTypeListName="CustomTableParameterTypeList" activeCollection="ISQLParameters" customInsert="INSERT INTO p_company_client
(p_company_client_id,
 p_client_id,
 code, company_name, description, creation_date, created_by, updated_date, updated_by) 
VALUES(nextval('p_company_client_id_seq'), 
 {p_client_id},
 '{code}', '{company_name}', '{description}', '{creation_date}', '{created_by}', '{updated_date}', '{updated_by}')" customInsertType="SQL">
							<Components>
								<TextBox id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="code" fieldSource="code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="{res:code}" caption="{res:code}" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentPanel2p_company_clientcode">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="company_name" fieldSource="company_name" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="{res:company_name}" caption="{res:company_name}" required="True" unique="False" wizardSize="50" wizardMaxLength="128" PathID="ContentPanel2p_company_clientcompany_name">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="description" fieldSource="description" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="{res:description}" caption="{res:description}" required="False" unique="False" wizardSize="50" wizardMaxLength="128" PathID="ContentPanel2p_company_clientdescription">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="creation_date" fieldSource="creation_date" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" features="(assigned)" wizardCaption="{res:creation_date}" caption="{res:creation_date}" required="True" format="dd/mm/yyyy" unique="False" wizardSize="8" wizardMaxLength="100" PathID="ContentPanel2p_company_clientcreation_date" defaultValue="CurrentDate">
									<Components/>
									<Events/>
									<Attributes/>
									<Features>
										<JDateTimePicker id="37" show_weekend="True" name="InlineDatePicker1" category="jQuery" enabled="True">
											<Components/>
											<Events/>
											<TableParameters/>
											<SPParameters/>
											<SQLParameters/>
											<JoinTables/>
											<JoinLinks/>
											<Fields/>
											<Features/>
										</JDateTimePicker>
									</Features>
								</TextBox>
								<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="created_by" fieldSource="created_by" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="{res:created_by}" caption="{res:created_by}" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentPanel2p_company_clientcreated_by" defaultValue="ccGetSession(&quot;UserLogin&quot;)">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="updated_date" fieldSource="updated_date" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" features="(assigned)" wizardCaption="{res:updated_date}" caption="{res:updated_date}" required="True" format="dd/mm/yyyy" unique="False" wizardSize="8" wizardMaxLength="100" PathID="ContentPanel2p_company_clientupdated_date" defaultValue="CurrentDate">
									<Components/>
									<Events/>
									<Attributes/>
									<Features>
										<JDateTimePicker id="40" show_weekend="True" name="InlineDatePicker2" category="jQuery" enabled="True">
											<Components/>
											<Events/>
											<TableParameters/>
											<SPParameters/>
											<SQLParameters/>
											<JoinTables/>
											<JoinLinks/>
											<Fields/>
											<Features/>
										</JDateTimePicker>
									</Features>
								</TextBox>
								<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="updated_by" fieldSource="updated_by" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="{res:updated_by}" caption="{res:updated_by}" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentPanel2p_company_clientupdated_by" defaultValue="ccGetSession(&quot;UserLogin&quot;)">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<Panel id="42" visible="True" generateDiv="False" name="CheckBox_Delete_Panel">
									<Components>
										<CheckBox id="43" visible="Dynamic" fieldSourceType="CodeExpression" dataType="Boolean" defaultValue="Unchecked" name="CheckBox_Delete" checkedValue="true" uncheckedValue="false" wizardCaption="{res:CCS_Delete}" wizardAddNbsp="True" PathID="ContentPanel2p_company_clientCheckBox_Delete_PanelCheckBox_Delete">
											<Components/>
											<Events/>
											<Attributes/>
											<Features/>
										</CheckBox>
									</Components>
									<Events/>
									<Attributes/>
									<Features/>
								</Panel>
								<Navigator id="44" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardPageSize="True" wizardImagesScheme="None">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Navigator>
								<Button id="45" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Submit" operation="Submit" wizardCaption="{res:CCS_Update}" PathID="ContentPanel2p_company_clientButton_Submit">
									<Components/>
									<Events>
										<Event name="OnClick" type="Client">
											<Actions>
												<Action actionName="Confirmation Message" actionCategory="General" id="46" message="{res:CCS_SubmitConfirmation}"/>
											</Actions>
										</Event>
									</Events>
									<Attributes/>
									<Features/>
								</Button>
								<Button id="47" urlType="Relative" enableValidation="False" isDefault="False" name="Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" PathID="ContentPanel2p_company_clientCancel">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Button>
							</Components>
							<Events/>
							<TableParameters>
								<TableParameter id="75" conditionType="Parameter" useIsNull="False" dataType="Float" defaultValue="0" field="p_client_id" logicOperator="And" parameterSource="p_client_id" parameterType="URL" searchConditionType="Equal"/>
							</TableParameters>
							<SPParameters/>
							<SQLParameters/>
							<JoinTables>
								<JoinTable id="74" posHeight="180" posLeft="10" posTop="10" posWidth="158" tableName="p_company_client"/>
							</JoinTables>
							<JoinLinks/>
							<Fields>
								<Field id="76" fieldName="*"/>
							</Fields>
							<PKFields>
							</PKFields>
							<ISPParameters/>
							<ISQLParameters>
								<SQLParameter id="62" variable="code" dataType="Text" parameterType="Control" parameterSource="code"/>
								<SQLParameter id="63" variable="company_name" dataType="Text" parameterType="Control" parameterSource="company_name"/>
								<SQLParameter id="64" variable="description" dataType="Text" parameterType="Control" parameterSource="description"/>
								<SQLParameter id="65" variable="creation_date" dataType="Date" parameterType="Control" parameterSource="creation_date" format="dd/mm/yyyy"/>
								<SQLParameter id="66" variable="created_by" dataType="Text" parameterType="Control" parameterSource="created_by"/>
								<SQLParameter id="67" variable="updated_date" dataType="Date" parameterType="Control" parameterSource="updated_date" format="dd/mm/yyyy"/>
								<SQLParameter id="68" variable="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by"/>
								<SQLParameter id="69" variable="p_client_id" parameterType="URL" defaultValue="-1" dataType="Integer" parameterSource="p_client_id"/>
							</ISQLParameters>
							<IFormElements>
								<CustomParameter id="55" field="code" dataType="Text" parameterType="Control" parameterSource="code"/>
								<CustomParameter id="56" field="company_name" dataType="Text" parameterType="Control" parameterSource="company_name"/>
								<CustomParameter id="57" field="description" dataType="Text" parameterType="Control" parameterSource="description"/>
								<CustomParameter id="58" field="creation_date" dataType="Date" parameterType="Control" parameterSource="creation_date" format="dd/mm/yyyy"/>
								<CustomParameter id="59" field="created_by" dataType="Text" parameterType="Control" parameterSource="created_by"/>
								<CustomParameter id="60" field="updated_date" dataType="Date" parameterType="Control" parameterSource="updated_date" format="dd/mm/yyyy"/>
								<CustomParameter id="61" field="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by"/>
							</IFormElements>
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
						</EditableGrid>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Panel>
			</Components>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="4" visible="True" generateDiv="False" name="Menu" contentPlaceholder="Menu">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="5" visible="True" generateDiv="False" name="Sidebar1" contentPlaceholder="Sidebar1">
			<Components>
				<Panel id="77" visible="True" name="TemplatePanel2" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="Sidebar1TemplatePanel2" masterPage="{CCS_PathToMasterPage}/VerticalMenu.ccp">
					<Components>
						<Panel id="78" visible="True" name="Title2" contentPlaceholder="Title">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<Panel id="79" visible="True" name="MenuItems2" contentPlaceholder="MenuItems">
							<Components>
								<IncludePage id="80" name="vmenu" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="Sidebar1TemplatePanel2MenuItems2vmenu" page="./vmenu.ccp">
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
					<Events/>
					<Attributes/>
					<Features/>
				</Panel>
			</Components>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="6" visible="True" generateDiv="False" name="HeaderSidebar" contentPlaceholder="HeaderSidebar">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="p_client_list_events.php" forShow="False" comment="//" codePage="windows-1252"/>
<CodeFile id="Code" language="PHPTemplates" name="p_client_list.php" forShow="True" url="p_client_list.php" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
