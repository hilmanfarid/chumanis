<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\admin" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" useDesign="True" masterPage="{CCS_PathToMasterPage}/MasterPage.ccp" wizardTheme="None" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Panel id="2" visible="True" generateDiv="False" name="Head" contentPlaceholder="Head">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="3" visible="True" generateDiv="False" name="Content" contentPlaceholder="Content">
			<Components>
				<Record id="7" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="p_client1" connection="hrcon" dataSource="p_client" errorSummator="Error" allowCancel="True" recordDeleteConfirmation="True" buttonsType="button" wizardRecordKey="p_client_id" encryptPasswordField="False" wizardUseInterVariables="True" pkIsAutoincrement="True" wizardCaption="{res:p_client_RecordForm}" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="MasterDetails" changedCaptionRecord="False" recordDirection="Vertical" masterAddTemplatePanel="False" ChooseDetailForm="Record" PathID="Contentp_client1" UseMasterRecord="UseNewRecordMaster" masterDetailType="Separate" composition="4" isParent="True" wizardLinkField="p_client_id">
					<Components>
						<Panel id="9" visible="True" generateDiv="False" name="Hide_Panel">
							<Components>
								<Button id="11" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="Contentp_client1Hide_PanelButton_Insert">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Button>
								<Button id="12" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="Contentp_client1Hide_PanelButton_Update">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Button>
								<Button id="13" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="Contentp_client1Hide_PanelButton_Delete">
									<Components/>
									<Events>
										<Event name="OnClick" type="Client">
											<Actions>
												<Action actionName="Confirmation Message" actionCategory="General" id="14" message="{res:CCS_DeleteConfirmation}"/>
											</Actions>
										</Event>
									</Events>
									<Attributes/>
									<Features/>
								</Button>
								<Button id="15" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" PathID="Contentp_client1Hide_PanelButton_Cancel">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Button>
							</Components>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="10" action="Hide" conditionType="Parameter" dataType="Integer" componentName="Hide_Panel" condition="Equal" name1="1" sourceType1="Expression" name2="1" sourceType2="Expression"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</Panel>
						<TextBox id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="code" fieldSource="code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="{res:code}" caption="{res:code}" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="Contentp_client1code">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="client_name" fieldSource="client_name" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="{res:client_name}" caption="{res:client_name}" required="True" unique="False" wizardSize="50" wizardMaxLength="128" PathID="Contentp_client1client_name">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="description" fieldSource="description" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="{res:description}" caption="{res:description}" required="False" unique="False" wizardSize="50" wizardMaxLength="128" PathID="Contentp_client1description">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="20" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="creation_date" fieldSource="creation_date" wizardIsPassword="False" wizardUseTemplateBlock="False" features="(assigned)" wizardCaption="{res:creation_date}" caption="{res:creation_date}" required="True" format="ShortDate" unique="False" wizardSize="8" wizardMaxLength="100" PathID="Contentp_client1creation_date">
							<Components/>
							<Events/>
							<Attributes/>
							<Features>
								<JDateTimePicker id="21" show_weekend="True" name="InlineDatePicker1" category="jQuery" enabled="True">
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
						<TextBox id="22" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="created_by" fieldSource="created_by" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="{res:created_by}" caption="{res:created_by}" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="Contentp_client1created_by">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="23" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="updated_date" fieldSource="updated_date" wizardIsPassword="False" wizardUseTemplateBlock="False" features="(assigned)" wizardCaption="{res:updated_date}" caption="{res:updated_date}" required="True" format="ShortDate" unique="False" wizardSize="8" wizardMaxLength="100" PathID="Contentp_client1updated_date">
							<Components/>
							<Events/>
							<Attributes/>
							<Features>
								<JDateTimePicker id="24" show_weekend="True" name="InlineDatePicker2" category="jQuery" enabled="True">
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
						<TextBox id="25" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="updated_by" fieldSource="updated_by" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="{res:updated_by}" caption="{res:updated_by}" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="Contentp_client1updated_by">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
					</Components>
					<Events>
						<Event name="BeforeExecuteInsert" type="Server">
							<Actions>
								<Action actionName="Master Detail Validate" actionCategory="General" id="63" detailsComponentName="p_company_client"/>
							</Actions>
						</Event>
						<Event name="AfterExecuteUpdate" type="Server">
							<Actions>
								<Action actionName="Master Detail Update" actionCategory="General" id="65" detailsComponentName="p_company_client" masterID="p_client_id"/>
							</Actions>
						</Event>
						<Event name="BeforeExecuteDelete" type="Server">
							<Actions>
								<Action actionName="Master Detail Delete" actionCategory="General" id="66" detailsComponentName="p_company_client" masterID="p_client_id"/>
							</Actions>
						</Event>
						<Event name="OnSubmit" type="Client">
							<Actions>
								<Action actionName="Get Data From Form" actionCategory="General" id="67" detailForm="p_company_client"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="83" conditionType="Parameter" useIsNull="False" dataType="Float" field="p_client_id" logicOperator="And" orderNumber="1" parameterSource="p_client_id" parameterType="URL" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="82" posHeight="180" posLeft="10" posTop="10" posWidth="115" tableName="p_client"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="84" fieldName="*"/>
					</Fields>
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
				<EditableGrid id="26" urlType="Relative" secured="False" emptyRows="3" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" sourceType="Table" defaultPageSize="10" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="p_company_client" connection="hrcon" dataSource="p_company_client" pageSizeLimit="100" wizardGridPageSize="True" wizardUseSearch="False" allowCancel="False" wizardSubmitConfirmation="False" wizardCaption="{res:p_company_client_EditableGridForm}" wizardGridType="Tabular" wizardAltRecord="False" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" wizardGridKey="p_company_client_id" wizardGridPaging="Simple" wizardAddNbsp="False" wizardTotalRecords="True" wizardButtonsType="button" changedCaptionEditableGrid="False" wizardUseInterVariables="True" pkIsAutoincrement="True" wizardType="MasterDetails" wizardThemeApplyTo="Page" detailAddTemplatePanel="False" ChooseDetailForm="EditableGrid" PathID="Contentp_company_client" deleteControl="CheckBox_Delete" customInsertType="SQL" customInsert="insert into p_company_client
(p_company_client_id,
 code,
 company_name,
 p_client_id,
 description,
 creation_date,
 created_by,
 updated_date,
 updated_by
)
values
(
 generate_id('chumanis','p_company_client','p_company_client_id'),
 '{code}',
 '{company_name}',
 '{p_client_id}',
 '{description}',
 current_date,
 '{created_by}',
current_date,
 '{created_by}'
)" UseDetailForm="UseNewDetailForm" composition="4" activeCollection="ISQLParameters" activeTableType="p_company_client" parameterTypeListName="CustomTableParameterTypeList">
					<Components>
						<Label id="29" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="p_company_client_TotalRecords" wizardUseTemplateBlock="False" PathID="Contentp_company_clientp_company_client_TotalRecords">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Retrieve number of records" actionCategory="Database" id="30"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="31" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="p_company_client_id" fieldSource="p_company_client_id" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="{res:p_company_client_id}" PathID="Contentp_company_clientp_company_client_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="code" fieldSource="code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="{res:code}" caption="{res:code}" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="Contentp_company_clientcode">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="company_name" fieldSource="company_name" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="{res:company_name}" caption="{res:company_name}" required="True" unique="False" wizardSize="50" wizardMaxLength="128" PathID="Contentp_company_clientcompany_name">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="description" fieldSource="description" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="{res:description}" caption="{res:description}" required="False" unique="False" wizardSize="50" wizardMaxLength="128" PathID="Contentp_company_clientdescription">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="creation_date" fieldSource="creation_date" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" features="(assigned)" wizardCaption="{res:creation_date}" caption="{res:creation_date}" required="True" format="ShortDate" unique="False" wizardSize="8" wizardMaxLength="100" PathID="Contentp_company_clientcreation_date">
							<Components/>
							<Events/>
							<Attributes/>
							<Features>
								<JDateTimePicker id="36" show_weekend="True" name="InlineDatePicker1" category="jQuery" enabled="True">
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
						<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="created_by" fieldSource="created_by" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="{res:created_by}" caption="{res:created_by}" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="Contentp_company_clientcreated_by">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="updated_date" fieldSource="updated_date" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" features="(assigned)" wizardCaption="{res:updated_date}" caption="{res:updated_date}" required="True" format="ShortDate" unique="False" wizardSize="8" wizardMaxLength="100" PathID="Contentp_company_clientupdated_date">
							<Components/>
							<Events/>
							<Attributes/>
							<Features>
								<JDateTimePicker id="39" show_weekend="True" name="InlineDatePicker2" category="jQuery" enabled="True">
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
						<TextBox id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="updated_by" fieldSource="updated_by" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="{res:updated_by}" caption="{res:updated_by}" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="Contentp_company_clientupdated_by">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<Panel id="41" visible="True" generateDiv="False" name="CheckBox_Delete_Panel">
							<Components>
								<CheckBox id="42" visible="Dynamic" fieldSourceType="CodeExpression" dataType="Boolean" defaultValue="Unchecked" name="CheckBox_Delete" checkedValue="true" uncheckedValue="false" wizardCaption="{res:CCS_Delete}" wizardAddNbsp="True" PathID="Contentp_company_clientCheckBox_Delete_PanelCheckBox_Delete">
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
						<Navigator id="43" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardPageSize="True" wizardImagesScheme="None">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Navigator>
						<Button id="44" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Submit" operation="Submit" wizardCaption="{res:CCS_Update}" PathID="Contentp_company_clientButton_Submit">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
					</Components>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Hide-Show Component" actionCategory="General" id="45" action="Hide" conditionType="Parameter" dataType="Integer" componentName="Button_Submit" condition="Equal" name1="1" sourceType1="Expression" name2="1" sourceType2="Expression"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="88" conditionType="Parameter" useIsNull="False" dataType="Float" defaultValue="0" field="p_client_id" logicOperator="And" orderNumber="1" parameterSource="p_client_id" parameterType="URL" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="87" posHeight="180" posLeft="10" posTop="10" posWidth="158" tableName="p_company_client"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="89" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="90" dataType="Float" fieldName="p_company_client_id" tableName="p_company_client"/>
					</PKFields>
					<ISPParameters/>
					<ISQLParameters>
						<SQLParameter id="91" variable="code" parameterType="Control" dataType="Text" parameterSource="code"/>
						<SQLParameter id="92" variable="company_name" parameterType="Control" dataType="Text" parameterSource="company_name"/>
						<SQLParameter id="93" variable="p_client_id" parameterType="URL" dataType="Text" parameterSource="p_client_id"/>
						<SQLParameter id="94" variable="description" parameterType="Control" dataType="Text" parameterSource="description"/>
						<SQLParameter id="95" variable="created_by" parameterType="Expression" dataType="Text" parameterSource="ccGetSession(&quot;UserLogin&quot;)"/>
					</ISQLParameters>
					<IFormElements>
						<CustomParameter id="47" field="code" dataType="Text" parameterType="Control" parameterSource="code"/>
						<CustomParameter id="48" field="company_name" dataType="Text" parameterType="Control" parameterSource="company_name"/>
						<CustomParameter id="49" field="description" dataType="Text" parameterType="Control" parameterSource="description"/>
						<CustomParameter id="50" field="creation_date" dataType="Date" parameterType="Control" parameterSource="creation_date" format="ShortDate"/>
						<CustomParameter id="51" field="created_by" dataType="Text" parameterType="Control" parameterSource="created_by"/>
						<CustomParameter id="52" field="updated_date" dataType="Date" parameterType="Control" parameterSource="updated_date" format="ShortDate"/>
						<CustomParameter id="53" field="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by"/>
						<CustomParameter id="54" field="p_client_id" dataType="Float" parameterSource="p_client_id" parameterType="URL"/>
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
				<Button id="55" urlType="Relative" enableValidation="True" isDefault="False" name="Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" composition="4" PathID="ContentInsert">
					<Components/>
					<Events>
						<Event name="OnLoad" type="Client">
							<Actions>
								<Action actionName="Emulate Record Button" actionCategory="General" id="56" recordForm="p_client1" operation="Insert"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="57" urlType="Relative" enableValidation="True" isDefault="False" name="Update" operation="Update" wizardCaption="{res:CCS_Update}" composition="4" PathID="ContentUpdate">
					<Components/>
					<Events>
						<Event name="OnLoad" type="Client">
							<Actions>
								<Action actionName="Emulate Record Button" actionCategory="General" id="58" recordForm="p_client1" operation="Update"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="59" urlType="Relative" enableValidation="False" isDefault="False" name="Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" composition="4" PathID="ContentDelete">
					<Components/>
					<Events>
						<Event name="OnLoad" type="Client">
							<Actions>
								<Action actionName="Emulate Record Button" actionCategory="General" id="60" recordForm="p_client1" operation="Delete"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="61" urlType="Relative" enableValidation="False" isDefault="False" name="Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" composition="4" PathID="ContentCancel">
					<Components/>
					<Events>
						<Event name="OnLoad" type="Client">
							<Actions>
								<Action actionName="Emulate Record Button" actionCategory="General" id="62" recordForm="p_client1" operation="Cancel"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Grid id="68" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" name="p_client2" connection="hrcon" dataSource="p_client" pageSizeLimit="100" pageSize="True" wizardCaption="{res:p_client_GridForm}" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="{res:CCS_NoRecords}" wizardGridPagingType="Simple" wizardUseSearch="True" wizardAddNbsp="True" gridTotalRecords="True" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="True" addTemplatePanel="False" changedCaptionGrid="False" gridExtendedHTML="False" PathID="Contentp_client2" composition="5" isParent="True">
					<Components>
						<Label id="70" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="p_client2_TotalRecords" wizardUseTemplateBlock="False" PathID="Contentp_client2p_client2_TotalRecords">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Retrieve number of records" actionCategory="Database" id="71"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</Label>
						<ImageLink id="72" visible="Yes" fieldSourceType="DBColumn" dataType="Float" hrefType="Page" preserveParameters="GET" name="p_client_id" fieldSource="p_client_id" wizardCaption="{res:p_client_id}" wizardIsPassword="False" wizardUseTemplateBlock="False" hrefSource="p_client.ccp" linkProperties="{'textSource':'Images/edit_small.png','textSourceDB':'p_client_id','hrefSource':'p_client.ccp','hrefSourceDB':'p_client_id','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'p_client_id','parameterName':'p_client_id'},'length':1,'objectType':'linkParameters'}}" wizardAddNbsp="True" PathID="Contentp_client2p_client_id" urlType="Relative">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="85" sourceType="DataField" name="p_client_id" source="p_client_id"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</ImageLink>
						<Label id="73" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="code" fieldSource="code" wizardCaption="{res:code}" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Contentp_client2code">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="74" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="client_name" fieldSource="client_name" wizardCaption="{res:client_name}" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Contentp_client2client_name">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="75" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="description" fieldSource="description" wizardCaption="{res:description}" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Contentp_client2description">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Navigator id="76" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardPageSize="True" wizardImagesScheme="None">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Navigator>
						<ImageLink id="86" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink1" PathID="Contentp_client2ImageLink1" hrefSource="p_client.ccp" linkProperties="{'textSource':'Images/add.png','textSourceDB':'','hrefSource':'p_client.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="p_client_id">
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
								<Action actionName="Advanced Search" actionCategory="General" id="81" searchForm="p_clientSearch" searchConditions="searchConditions" searchControl="s_keyword" searchDBFields="code,client_name,description"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters/>
					<JoinTables>
						<JoinTable id="69" tableName="p_client"/>
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
				<Record id="77" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="p_clientSearch" searchIds="77" fictitiousConnection="chumanis" wizardCaption="{res:Search_Form}" wizardOrientation="Vertical" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="Advanced" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="True" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardType="Grid" returnPage="p_client.ccp" PathID="Contentp_clientSearch" composition="5" connection="hrcon">
					<Components>
						<Button id="78" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="Contentp_clientSearchButton_DoSearch">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<TextBox id="79" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" fieldSource="code,client_name,description" wizardIsPassword="False" wizardCaption="{res:CCS_Filter}" caption="{res:CCS_Filter}" required="False" unique="False" wizardSize="50" wizardMaxLength="64" PathID="Contentp_clientSearchs_keyword">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<ListBox id="80" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="searchConditions" dataSource="1;{res:CCS_AdvSearchAnyOfWords};2;{res:CCS_AdvSearchAllWords};3;{res:CCS_AdvSearchExactPhrase}" wizardCaption="{res:CCS_AdvSearchConditionsCaption}" PathID="Contentp_clientSearchsearchConditions">
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
		<Panel id="4" visible="True" generateDiv="False" name="Menu" contentPlaceholder="Menu">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="5" visible="True" generateDiv="False" name="Sidebar1" contentPlaceholder="Sidebar1">
			<Components/>
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
		<CodeFile id="Events" language="PHPTemplates" name="p_client_events.php" forShow="False" comment="//" codePage="windows-1252"/>
<CodeFile id="Code" language="PHPTemplates" name="p_client.php" forShow="True" url="p_client.php" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
