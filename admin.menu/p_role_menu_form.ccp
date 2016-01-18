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
				<Record id="4" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="roleMenuForm" connection="hrcon" dataSource="p_role_menu, p_role" errorSummator="Error" allowCancel="True" recordDeleteConfirmation="True" buttonsType="button" wizardRecordKey="p_role_id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Role" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" templatePageRecord="C:/Program Files (x86)/CodeChargeStudio5/Templates/Record/Dialog.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="ContentroleMenuForm" returnPage="p_role_menu.ccp" parameterTypeListName="ParameterTypeList" activeCollection="UFormElements" customInsertType="Table" activeTableType="p_role_menu" customUpdateType="Table" customUpdate="p_role_menu" customDeleteType="Table" customInsert="p_role_menu" customDelete="p_role_menu" removeParameters="ccsForm;p_role_menu_id">
					<Components>
						<Button id="5" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="ContentroleMenuFormButton_Insert">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="6" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="ContentroleMenuFormButton_Update">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="7" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="ContentroleMenuFormButton_Delete" removeParameters="p_role_id">
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
						<Button id="9" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="ContentroleMenuFormButton_Cancel">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<TextArea id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="description" fieldSource="description" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Description" caption="Description" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="ContentroleMenuFormdescription">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextArea>
						<ListBox id="17" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="is_active" fieldSource="is_active" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Is Active" caption="Is Active" required="True" unique="False" connection="hrcon" wizardEmptyCaption="Select Value" PathID="ContentroleMenuFormis_active" dataSource="Y;ENABLE;N;DISABLE">
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
						<Hidden id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="p_role_menu_id" PathID="ContentroleMenuFormp_role_menu_id" fieldSource="p_role_menu_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="19" fieldSourceType="DBColumn" dataType="Float" name="p_role_id" fieldSource="p_role_id" PathID="ContentroleMenuFormp_role_id" visible="Yes">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="20" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="p_menu_id" PathID="ContentroleMenuFormp_menu_id" fieldSource="p_menu_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<TextBox id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="valid_from" PathID="ContentroleMenuFormvalid_from" fieldSource="valid_from" format="dd-mmm-yyyy" defaultValue="CurrentDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<DatePicker id="22" name="DatePicker_valid_from1" PathID="ContentroleMenuFormDatePicker_valid_from1" control="valid_from" wizardDatePickerType="Image" wizardPicture="{CCS_PathToMasterPage}/Images/DatePicker.png">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</DatePicker>
						<TextBox id="23" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="valid_to" PathID="ContentroleMenuFormvalid_to" fieldSource="valid_to" format="dd-mmm-yyyy" defaultValue="CurrentDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<DatePicker id="66" name="DatePicker_valid_from2" PathID="ContentroleMenuFormDatePicker_valid_from2" control="valid_from" wizardDatePickerType="Image" wizardPicture="{CCS_PathToMasterPage}/Images/DatePicker.png">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</DatePicker>
						<DatePicker id="67" name="DatePicker_valid_to1" PathID="ContentroleMenuFormDatePicker_valid_to1" control="valid_to" wizardDatePickerType="Image" wizardPicture="{CCS_PathToMasterPage}/Images/DatePicker.png">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</DatePicker>
						<TextBox id="11" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="role_name" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Description" caption="role_name" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="ContentroleMenuFormrole_name" generateDiv="False" fieldSource="role_name">
							<Components/>
							<Events/>
							<Attributes/>
							<Features>
							</Features>
						</TextBox>
						<TextBox id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="updated_by" fieldSource="updated_by" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Updated By" caption="Updated By" required="False" unique="False" wizardSize="32" wizardMaxLength="32" PathID="ContentroleMenuFormupdated_by" defaultValue="CCGetUserLogin()">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
<TextBox id="12" visible="Dynamic" fieldSourceType="DBColumn" dataType="Date" name="creation_date" fieldSource="creation_date" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Creation Date" caption="Creation Date" required="False" format="dd-mmm-yyyy" unique="False" wizardSize="8" wizardMaxLength="100" PathID="ContentroleMenuFormcreation_date" defaultValue="CurrentDate" generateDiv="False">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
<TextBox id="14" visible="Dynamic" fieldSourceType="DBColumn" dataType="Date" name="updated_date" fieldSource="updated_date" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Updated Date" caption="Updated Date" required="False" format="dd-mmm-yyyy" unique="False" wizardSize="8" wizardMaxLength="100" PathID="ContentroleMenuFormupdated_date" defaultValue="CurrentDate" generateDiv="False">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
<TextBox id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="created_by" fieldSource="created_by" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Created By" caption="Created By" required="False" unique="False" wizardSize="32" wizardMaxLength="32" PathID="ContentroleMenuFormcreated_by" defaultValue="CCGetUserLogin()">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
</Components>
					<Events/>
					<TableParameters>
						<TableParameter id="114" conditionType="Parameter" useIsNull="False" dataType="Float" field="p_role_menu_id" leftBrackets="0" logicOperator="And" orderNumber="1" parameterSource="p_role_menu_id" parameterType="URL" rightBrackets="0" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="117" tableName="p_role_menu"/>
						<JoinTable id="118" tableName="p_role"/>
					</JoinTables>
					<JoinLinks>
						<JoinTable2 id="113" conditionType="Equal" fieldLeft="p_role_menu.p_role_id" fieldRight="p_role.p_role_id" joinType="inner" tableLeft="p_role_menu" tableRight="p_role"/>
					</JoinLinks>
					<Fields>
						<Field id="115" fieldName="p_role_menu.*" tableName="p_role_menu"/>
						<Field id="116" alias="role_name" fieldName="code" tableName="p_role"/>
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
						<CustomParameter id="88" field="creation_date" dataType="Date" parameterType="Control" parameterSource="creation_date" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="89" field="created_by" dataType="Text" parameterType="Control" parameterSource="created_by" omitIfEmpty="True"/>
						<CustomParameter id="90" field="updated_date" dataType="Date" parameterType="Control" parameterSource="updated_date" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="91" field="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by" omitIfEmpty="True"/>
						<CustomParameter id="92" field="description" dataType="Text" parameterType="Control" parameterSource="description" omitIfEmpty="True"/>
						<CustomParameter id="95" field="p_role_id" dataType="Float" parameterType="Control" parameterSource="p_role_id" omitIfEmpty="True"/>
						<CustomParameter id="96" field="p_menu_id" dataType="Float" parameterType="Control" parameterSource="p_menu_id" omitIfEmpty="True"/>
						<CustomParameter id="97" field="valid_from" dataType="Date" parameterType="Control" parameterSource="valid_from" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="98" field="valid_to" dataType="Date" parameterType="Control" parameterSource="valid_to" format="dd-mmm-yyyy" omitIfEmpty="True"/>
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
						<TableParameter id="53" conditionType="Parameter" useIsNull="False" field="p_role_menu_id" dataType="Float" parameterType="URL" searchConditionType="Equal" logicOperator="And" orderNumber="1" parameterSource="p_role_menu_id"/>
					</UConditions>
					<UFormElements>
						<CustomParameter id="100" field="creation_date" dataType="Date" parameterType="Control" parameterSource="creation_date" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="101" field="created_by" dataType="Text" parameterType="Control" parameterSource="created_by" omitIfEmpty="True"/>
						<CustomParameter id="102" field="updated_date" dataType="Date" parameterType="Control" parameterSource="updated_date" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="103" field="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by" omitIfEmpty="True"/>
						<CustomParameter id="104" field="description" dataType="Text" parameterType="Control" parameterSource="description" omitIfEmpty="True"/>
						<CustomParameter id="107" field="p_role_id" dataType="Float" parameterType="Control" parameterSource="p_role_id" omitIfEmpty="True"/>
						<CustomParameter id="109" field="valid_from" dataType="Date" parameterType="Control" parameterSource="valid_from" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="110" field="valid_to" dataType="Date" parameterType="Control" parameterSource="valid_to" format="dd-mmm-yyyy" omitIfEmpty="True"/>
					</UFormElements>
					<DSPParameters/>
					<DSQLParameters/>
					<DConditions>
						<TableParameter id="64" conditionType="Parameter" useIsNull="False" field="p_role_menu_id" dataType="Float" parameterType="URL" searchConditionType="Equal" logicOperator="And" orderNumber="1" parameterSource="p_role_menu_id"/>
					</DConditions>
					<SecurityGroups>
						<Group id="65" groupID="1" read="True" insert="True" update="True" delete="True"/>
					</SecurityGroups>
					<Attributes/>
					<Features/>
				</Record>
				<Panel id="119" visible="True" generateDiv="False" name="LovContainer" PathID="ContentLovContainer">
					<Components>
						<IncludePage id="120" name="modal_start" PathID="ContentLovContainermodal_start" page="../Designs/modal/modal_start.ccp">
							<Components/>
							<Events/>
							<Features/>
						</IncludePage>
						<Panel id="121" visible="Dynamic" generateDiv="False" name="LovAjaxPanel" PathID="ContentLovContainerLovAjaxPanel" features="(assigned)">
							<Components>
							</Components>
							<Events/>
							<Attributes/>
							<Features>
								<JUpdatePanel id="122" enabled="True" childrenAsTriggers="False" name="JUpdatePanel1" category="jQuery" ccsIdsOnly="False" featureNameChanged="No">
									<Components/>
									<Events/>
									<ControlPoints/>
									<Features/>
								</JUpdatePanel>
							</Features>
						</Panel>
						<IncludePage id="123" name="modal_end" PathID="ContentLovContainermodal_end" page="../Designs/modal/modal_end.ccp">
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
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_role_menu_form.php" forShow="True" url="p_role_menu_form.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_role_menu_form_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
