<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\admin.menu" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" useDesign="True" needGeneration="0" masterPage="../Designs/d01/MasterPage.ccp" wizardTheme="None" wizardThemeVersion="3.0">
	<Components>
		<Panel id="2" visible="True" generateDiv="False" name="Head" contentPlaceholder="Head">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="3" visible="True" generateDiv="False" name="Content" contentPlaceholder="Content">
			<Components>
				<Record id="4" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="roleForm" connection="hrcon" dataSource="p_role_module, p_role" errorSummator="Error" allowCancel="True" recordDeleteConfirmation="True" buttonsType="button" wizardRecordKey="p_role_id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Role" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" templatePageRecord="C:/Program Files (x86)/CodeChargeStudio5/Templates/Record/Dialog.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="ContentroleForm" returnPage="p_role_module.ccp" parameterTypeListName="ParameterTypeList" activeCollection="UConditions" customInsertType="Table" activeTableType="customUpdate" customUpdateType="Table" customUpdate="p_role_module" customDeleteType="Table" customInsert="p_role_module" customDelete="p_role_module" removeParameters="ccsForm">
					<Components>
						<Button id="5" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="ContentroleFormButton_Insert">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="6" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="ContentroleFormButton_Update">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="7" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="ContentroleFormButton_Delete" removeParameters="p_role_id">
							<Components/>
							<Events>
								<Event name="OnClick" type="Client">
									<Actions>
										<Action actionName="Confirmation Message" actionCategory="General" id="8" message="Delete record?" eventType="Client"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="9" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="ContentroleFormButton_Cancel">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<TextBox id="12" visible="Dynamic" fieldSourceType="DBColumn" dataType="Date" name="creation_date" fieldSource="creation_date" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Creation Date" caption="Creation Date" required="False" format="dd-mmm-yyyy" unique="False" wizardSize="8" wizardMaxLength="100" PathID="ContentroleFormcreation_date" defaultValue="CurrentDate" generateDiv="False">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextArea id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="description" fieldSource="description" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Description" caption="Description" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="ContentroleFormdescription">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextArea>
						<ListBox id="17" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="is_active" fieldSource="is_active" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Is Active" caption="Is Active" required="True" unique="False" connection="hrcon" wizardEmptyCaption="Select Value" PathID="ContentroleFormis_active" dataSource="Y;ENABLE;N;DISABLE">
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
						<Hidden id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="p_role_module_id" PathID="ContentroleFormp_role_module_id" fieldSource="p_role_module_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="19" fieldSourceType="DBColumn" dataType="Float" name="p_role_id" fieldSource="p_role_id" PathID="ContentroleFormp_role_id" visible="Yes">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="20" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="p_module_id" PathID="ContentroleFormp_module_id" fieldSource="p_module_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<TextBox id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="valid_from" PathID="ContentroleFormvalid_from" fieldSource="valid_from" format="dd-mmm-yyyy" defaultValue="CurrentDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<DatePicker id="22" name="DatePicker_valid_from1" PathID="ContentroleFormDatePicker_valid_from1" control="valid_from" wizardDatePickerType="Image" wizardPicture="{CCS_PathToMasterPage}/Images/DatePicker.png">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</DatePicker>
						<TextBox id="23" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="valid_to" PathID="ContentroleFormvalid_to" fieldSource="valid_to" format="dd-mmm-yyyy" defaultValue="CurrentDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<DatePicker id="66" name="DatePicker_valid_from2" PathID="ContentroleFormDatePicker_valid_from2" control="valid_from" wizardDatePickerType="Image" wizardPicture="{CCS_PathToMasterPage}/Images/DatePicker.png">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</DatePicker>
						<DatePicker id="67" name="DatePicker_valid_to1" PathID="ContentroleFormDatePicker_valid_to1" control="valid_to" wizardDatePickerType="Image" wizardPicture="{CCS_PathToMasterPage}/Images/DatePicker.png">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</DatePicker>
						<TextBox id="11" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="role_name" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Description" caption="role_name" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="ContentroleFormrole_name" features="(assigned)" generateDiv="False" fieldSource="role_name">
							<Components/>
							<Events/>
							<Attributes/>
							<Features>
								<JAutocomplete id="68" enabled="True" istemplate="Text with description" template="{@text_desc}" advanced="This is parent control, all controls below is children" height="default" width="default" hscrollbar="default" vscrollbar="default" name="JAutocomplete2" servicePage="../services/admin_p_role_module_form2_roleForm_role_name_JAutocomplete1.ccp" category="jQuery" searchField="p_role_id" connection="hrcon" featureNameChanged="No" dataSource="p_role" value="desc">
									<Components/>
									<Events/>
									<TableParameters/>
									<SPParameters/>
									<SQLParameters/>
									<JoinTables/>
									<JoinLinks/>
									<Fields/>
									<Features/>
								</JAutocomplete>
							</Features>
						</TextBox>
						<TextBox id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="created_by" fieldSource="created_by" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Created By" caption="Created By" required="False" unique="False" wizardSize="32" wizardMaxLength="32" PathID="ContentroleFormcreated_by" defaultValue="CCGetUserLogin()">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
<TextBox id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="updated_by" fieldSource="updated_by" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Updated By" caption="Updated By" required="False" unique="False" wizardSize="32" wizardMaxLength="32" PathID="ContentroleFormupdated_by" defaultValue="CCGetUserLogin()">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
<TextBox id="14" visible="Dynamic" fieldSourceType="DBColumn" dataType="Date" name="updated_date" fieldSource="updated_date" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Updated Date" caption="Updated Date" required="False" format="dd-mmm-yyyy" unique="False" wizardSize="8" wizardMaxLength="100" PathID="ContentroleFormupdated_date" defaultValue="CurrentDate" generateDiv="False">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
</Components>
					<Events/>
					<TableParameters>
						<TableParameter id="74" conditionType="Parameter" useIsNull="False" dataType="Float" field="p_role_module.p_role_module_id" logicOperator="And" orderNumber="1" parameterSource="p_role_module_id" parameterType="URL" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="71" posHeight="180" posLeft="10" posTop="10" posWidth="137" tableName="p_role_module"/>
						<JoinTable id="72" posHeight="180" posLeft="168" posTop="10" posWidth="115" schemaName="chumanis" tableName="p_role"/>
					</JoinTables>
					<JoinLinks>
						<JoinTable2 id="73" conditionType="Equal" fieldLeft="p_role_module.p_role_id" fieldRight="p_role.p_role_id" joinType="inner" tableLeft="p_role_module" tableRight="p_role"/>
					</JoinLinks>
					<Fields>
						<Field id="75" fieldName="p_role_module.*" tableName="p_role_module"/>
						<Field id="76" alias="role_name" fieldName="code" tableName="p_role"/>
					</Fields>
					<PKFields/>
					<ISPParameters/>
					<ISQLParameters>
						<SQLParameter id="27" variable="code" dataType="Text" parameterType="Control" parameterSource="code"/>
						<SQLParameter id="28" variable="is_active" dataType="Text" parameterType="Control" parameterSource="is_active"/>
						<SQLParameter id="29" variable="description" dataType="Text" parameterType="Control" parameterSource="description"/>
						<SQLParameter id="30" variable="creation_date" dataType="Date" parameterType="Control" parameterSource="creation_date" format="dd-mmm-yyyy" defaultValue="date('Y-m-d')"/>
						<SQLParameter id="31" variable="created_by" dataType="Text" parameterType="Control" parameterSource="created_by"/>
						<SQLParameter id="32" variable="updated_date" dataType="Date" parameterType="Control" parameterSource="updated_date" format="dd-mmm-yyyy" defaultValue="date('Y-m-d')"/>
						<SQLParameter id="33" variable="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by"/>
						<SQLParameter id="34" variable="p_role_id" dataType="Float" parameterType="Control" parameterSource="p_role_id"/>
					</ISQLParameters>
					<IFormElements>
						<CustomParameter id="35" field="creation_date" dataType="Date" parameterType="Control" parameterSource="creation_date" omitIfEmpty="True" format="dd-mmm-yyyy"/>
						<CustomParameter id="36" field="created_by" dataType="Text" parameterType="Control" parameterSource="created_by" omitIfEmpty="True"/>
						<CustomParameter id="37" field="updated_date" dataType="Date" parameterType="Control" parameterSource="updated_date" omitIfEmpty="True" format="dd-mmm-yyyy"/>
						<CustomParameter id="38" field="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by" omitIfEmpty="True"/>
						<CustomParameter id="39" field="p_role_id" dataType="Float" parameterType="Control" parameterSource="p_role_id" omitIfEmpty="False"/>
						<CustomParameter id="41" field="p_module_id" dataType="Float" parameterType="Control" parameterSource="p_module_id" omitIfEmpty="True"/>
						<CustomParameter id="42" field="description" dataType="Text" parameterType="Control" parameterSource="description" omitIfEmpty="True"/>
						<CustomParameter id="43" field="valid_from" dataType="Date" parameterType="Control" parameterSource="valid_from" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="44" field="valid_to" dataType="Date" parameterType="Control" parameterSource="valid_to" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="69" field="is_active" dataType="Text" parameterType="Control" parameterSource="is_active" omitIfEmpty="True"/>
						<CustomParameter id="70" field="p_role_module_id" dataType="Float" parameterType="Control" parameterSource="p_role_module_id" omitIfEmpty="True"/>
					</IFormElements>
					<USPParameters/>
					<USQLParameters>
						<SQLParameter id="45" variable="code" dataType="Text" parameterType="Control" parameterSource="code"/>
						<SQLParameter id="46" variable="is_active" dataType="Text" parameterType="Control" parameterSource="is_active"/>
						<SQLParameter id="47" variable="description" dataType="Text" parameterType="Control" parameterSource="description"/>
						<SQLParameter id="48" variable="creation_date" dataType="Text" parameterType="Control" parameterSource="creation_date" format="dd-mmm-yyyy"/>
						<SQLParameter id="49" variable="created_by" dataType="Text" parameterType="Control" parameterSource="created_by"/>
						<SQLParameter id="50" variable="updated_date" dataType="Text" parameterType="Control" parameterSource="updated_date" format="dd-mmm-yyyy"/>
						<SQLParameter id="51" variable="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by"/>
						<SQLParameter id="52" variable="p_role_id" dataType="Float" parameterType="URL" parameterSource="p_role_id" defaultValue="0"/>
					</USQLParameters>
					<UConditions>
						<TableParameter id="53" conditionType="Parameter" useIsNull="False" field="p_role_module_id" dataType="Float" parameterType="URL" searchConditionType="Equal" logicOperator="And" orderNumber="1" parameterSource="p_role_module_id"/>
					</UConditions>
					<UFormElements>
						<CustomParameter id="54" field="description" dataType="Text" parameterType="Control" parameterSource="description" omitIfEmpty="True"/>
						<CustomParameter id="55" field="creation_date" dataType="Text" parameterType="Control" parameterSource="creation_date" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="56" field="created_by" dataType="Text" parameterType="Control" parameterSource="created_by" omitIfEmpty="True"/>
						<CustomParameter id="57" field="updated_date" dataType="Text" parameterType="Control" parameterSource="updated_date" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="58" field="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by" omitIfEmpty="True"/>
						<CustomParameter id="59" field="p_role_id" dataType="Float" parameterType="Control" parameterSource="p_role_id" omitIfEmpty="True"/>
						<CustomParameter id="61" field="p_module_id" dataType="Float" parameterType="Control" parameterSource="p_module_id" omitIfEmpty="True"/>
						<CustomParameter id="62" field="valid_from" dataType="Date" parameterType="Control" parameterSource="valid_from" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="63" field="valid_to" dataType="Date" parameterType="Control" parameterSource="valid_to" format="dd-mmm-yyyy" omitIfEmpty="True"/>
					</UFormElements>
					<DSPParameters/>
					<DSQLParameters/>
					<DConditions>
						<TableParameter id="64" conditionType="Parameter" useIsNull="False" field="p_role_module_id" dataType="Float" parameterType="URL" searchConditionType="Equal" logicOperator="And" orderNumber="1" parameterSource="p_role_module_id"/>
					</DConditions>
					<SecurityGroups>
						<Group id="65" groupID="1" read="True" insert="True" update="True" delete="True"/>
					</SecurityGroups>
					<Attributes/>
					<Features/>
				</Record>
			</Components>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_role_module_form.php" forShow="True" url="p_role_module_form.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
