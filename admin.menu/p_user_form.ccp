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
				<Record id="4" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="roleForm" connection="hrcon" dataSource="SELECT a.*, b.company_name,
CASE WHEN a.user_status_id = 1 THEN 'ACTIVE'
     WHEN a.user_status_id = 2 THEN 'BLOCKED'
     WHEN a.user_status_id = 3 THEN 'NEW'
     WHEN a.user_status_id = 4 THEN 'INACTIVE'
     ELSE ''
END AS user_status
FROM p_user AS a
LEFT JOIN p_company_client AS b ON a.p_company_client_id = b.p_company_client_id
WHERE p_user_id = {p_user_id} " errorSummator="Error" allowCancel="True" recordDeleteConfirmation="True" buttonsType="button" wizardRecordKey="p_role_id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Role" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" templatePageRecord="C:/Program Files (x86)/CodeChargeStudio5/Templates/Record/Dialog.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="ContentroleForm" returnPage="p_user.ccp" parameterTypeListName="ParameterTypeList" activeCollection="DConditions" customInsertType="Table" activeTableType="customDelete" customInsert="p_user" customUpdateType="Table" customUpdate="p_user" customDeleteType="Table" customDelete="p_user">
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
						<Button id="7" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="ContentroleFormButton_Delete" removeParameters="p_user_id">
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
						<ListBox id="11" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="user_status_id" fieldSource="user_status_id" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Is Active" caption="Status User" required="True" unique="False" connection="hrcon" wizardEmptyCaption="Select Value" PathID="ContentroleFormuser_status_id" dataSource="1;ACTIVE;2;BLOCKED;3;NEW;4;INACTIVE">
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
						<Hidden id="17" fieldSourceType="DBColumn" dataType="Float" name="p_user_id" PathID="ContentroleFormp_user_id" fieldSource="p_user_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<TextBox id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="full_name" fieldSource="full_name" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="Nama Lengkap User" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormfull_name">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="created_by" fieldSource="created_by" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Created By" caption="Created By" required="False" unique="False" wizardSize="32" wizardMaxLength="32" PathID="ContentroleFormcreated_by" defaultValue="CCGetUserLogin()">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="13" visible="Dynamic" fieldSourceType="DBColumn" dataType="Date" name="creation_date" fieldSource="creation_date" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Creation Date" caption="Creation Date" required="False" format="dd-mmm-yyyy" unique="False" wizardSize="8" wizardMaxLength="100" PathID="ContentroleFormcreation_date" defaultValue="CurrentDate" generateDiv="False">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="updated_by" fieldSource="updated_by" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Updated By" caption="Updated By" required="False" unique="False" wizardSize="32" wizardMaxLength="32" PathID="ContentroleFormupdated_by" defaultValue="CCGetUserLogin()">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="15" visible="Dynamic" fieldSourceType="DBColumn" dataType="Date" name="updated_date" fieldSource="updated_date" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Updated Date" caption="Updated Date" required="False" format="dd-mmm-yyyy" unique="False" wizardSize="8" wizardMaxLength="100" PathID="ContentroleFormupdated_date" defaultValue="CurrentDate" generateDiv="False">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="63" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ip_address_4" fieldSource="ip_address_4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="IP Address 4" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormip_address_4">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
<TextBox id="65" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="user_name" fieldSource="user_name" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="Nama User" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormuser_name">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
<TextBox id="77" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ip_address_6" fieldSource="ip_address_6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="IP Address 6" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormip_address_6">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
<TextBox id="78" visible="Dynamic" fieldSourceType="DBColumn" dataType="Date" name="last_login_time" fieldSource="last_login_time" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Creation Date" caption="Terakhir Login" required="False" format="dd-mmm-yyyy" unique="False" wizardSize="8" wizardMaxLength="100" PathID="ContentroleFormlast_login_time" defaultValue="CurrentDate" generateDiv="False">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
<TextBox id="79" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="email_address" fieldSource="email_address" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="Email" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormemail_address">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
<TextBox id="80" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="expired_user_date" fieldSource="expired_user_date" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="Kadaluarsa User" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormexpired_user_date" format="dd-mmm-yyyy">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
<TextBox id="81" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="expired_pwd_date" fieldSource="expired_pwd_date" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="Kadaluarsa Password" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormexpired_pwd_date" format="dd-mmm-yyyy">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
<DatePicker id="82" name="DatePicker_expired_user_date1" PathID="ContentroleFormDatePicker_expired_user_date1" control="expired_user_date" wizardDatePickerType="Image" wizardPicture="{CCS_PathToMasterPage}/Images/DatePicker.png">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<DatePicker id="83" name="DatePicker_expired_pwd_date1" PathID="ContentroleFormDatePicker_expired_pwd_date1" control="expired_pwd_date" wizardDatePickerType="Image" wizardPicture="{CCS_PathToMasterPage}/Images/DatePicker.png">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<TextBox id="87" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="company_name" fieldSource="company_name" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="Nama Perusahaan" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormcompany_name">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
<Hidden id="89" fieldSourceType="DBColumn" dataType="Integer" name="p_company_client_id" PathID="ContentroleFormp_company_client_id" fieldSource="p_company_client_id" caption="ID Perusahaan">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
					<Events/>
					<TableParameters>
					</TableParameters>
					<SPParameters/>
					<SQLParameters>
<SQLParameter id="88" dataType="Float" defaultValue="0" parameterSource="p_user_id" parameterType="URL" variable="p_user_id"/>
</SQLParameters>
					<JoinTables>
					</JoinTables>
					<JoinLinks/>
					<Fields>
					</Fields>
					<PKFields/>
					<ISPParameters/>
					<ISQLParameters>
						<SQLParameter id="21" variable="code" dataType="Text" parameterType="Control" parameterSource="code"/>
						<SQLParameter id="22" variable="is_active" dataType="Text" parameterType="Control" parameterSource="is_active"/>
						<SQLParameter id="23" variable="description" dataType="Text" parameterType="Control" parameterSource="description"/>
						<SQLParameter id="24" variable="creation_date" dataType="Date" parameterType="Control" parameterSource="creation_date" format="dd-mmm-yyyy" defaultValue="date('Y-m-d')"/>
						<SQLParameter id="25" variable="created_by" dataType="Text" parameterType="Control" parameterSource="created_by"/>
						<SQLParameter id="26" variable="updated_date" dataType="Date" parameterType="Control" parameterSource="updated_date" format="dd-mmm-yyyy" defaultValue="date('Y-m-d')"/>
						<SQLParameter id="27" variable="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by"/>
						<SQLParameter id="28" variable="p_role_id" dataType="Float" parameterType="Control" parameterSource="p_role_id"/>
					</ISQLParameters>
					<IFormElements>
						<CustomParameter id="29" field="code" dataType="Text" parameterType="Control" parameterSource="code" omitIfEmpty="True"/>
						<CustomParameter id="30" field="is_active" dataType="Text" parameterType="Control" parameterSource="is_active" omitIfEmpty="True"/>
						<CustomParameter id="31" field="description" dataType="Text" parameterType="Control" parameterSource="description" omitIfEmpty="True"/>
						<CustomParameter id="32" field="creation_date" dataType="Date" parameterType="Control" parameterSource="creation_date" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="33" field="created_by" dataType="Text" parameterType="Control" parameterSource="created_by" omitIfEmpty="True"/>
						<CustomParameter id="34" field="updated_date" dataType="Date" parameterType="Control" parameterSource="updated_date" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="35" field="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by" omitIfEmpty="True"/>
						<CustomParameter id="36" field="p_module_id" dataType="Float" parameterType="Control" parameterSource="p_module_id" omitIfEmpty="True"/>
						<CustomParameter id="37" field="tooltip_text" dataType="Text" parameterType="Control" parameterSource="tooltip_text" omitIfEmpty="True"/>
						<CustomParameter id="38" field="listing_no" dataType="Text" parameterType="Control" parameterSource="listing_no" omitIfEmpty="True"/>
						<CustomParameter id="66" field="user_status_id" dataType="Text" parameterType="Control" parameterSource="user_status_id" omitIfEmpty="True"/>
<CustomParameter id="67" field="p_user_id" dataType="Float" parameterType="Control" parameterSource="p_user_id" omitIfEmpty="True"/>
<CustomParameter id="68" field="full_name" dataType="Text" parameterType="Control" parameterSource="full_name" omitIfEmpty="True"/>
<CustomParameter id="69" field="ip_address_4" dataType="Text" parameterType="Control" parameterSource="ip_address_4" omitIfEmpty="True"/>
<CustomParameter id="70" field="user_name" dataType="Text" parameterType="Control" parameterSource="user_name" omitIfEmpty="True"/>
</IFormElements>
					<USPParameters/>
					<USQLParameters>
						<SQLParameter id="39" variable="code" dataType="Text" parameterType="Control" parameterSource="code"/>
						<SQLParameter id="40" variable="is_active" dataType="Text" parameterType="Control" parameterSource="is_active"/>
						<SQLParameter id="41" variable="description" dataType="Text" parameterType="Control" parameterSource="description"/>
						<SQLParameter id="42" variable="creation_date" dataType="Text" parameterType="Control" parameterSource="creation_date" format="dd-mmm-yyyy"/>
						<SQLParameter id="43" variable="created_by" dataType="Text" parameterType="Control" parameterSource="created_by"/>
						<SQLParameter id="44" variable="updated_date" dataType="Text" parameterType="Control" parameterSource="updated_date" format="dd-mmm-yyyy"/>
						<SQLParameter id="45" variable="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by"/>
						<SQLParameter id="46" variable="p_role_id" dataType="Float" parameterType="URL" parameterSource="p_role_id" defaultValue="0"/>
					</USQLParameters>
					<UConditions>
						<TableParameter id="47" conditionType="Parameter" useIsNull="False" field="p_user_id" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="p_user_id"/>
					</UConditions>
					<UFormElements>
						<CustomParameter id="48" field="code" dataType="Text" parameterType="Control" parameterSource="code" omitIfEmpty="True"/>
						<CustomParameter id="49" field="is_active" dataType="Text" parameterType="Control" parameterSource="is_active" omitIfEmpty="True"/>
						<CustomParameter id="50" field="description" dataType="Text" parameterType="Control" parameterSource="description" omitIfEmpty="True"/>
						<CustomParameter id="51" field="creation_date" dataType="Date" parameterType="Control" parameterSource="creation_date" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="52" field="created_by" dataType="Text" parameterType="Control" parameterSource="created_by" omitIfEmpty="True"/>
						<CustomParameter id="53" field="updated_date" dataType="Date" parameterType="Control" parameterSource="updated_date" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="54" field="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by" omitIfEmpty="True"/>
						<CustomParameter id="55" field="p_module_id" dataType="Float" parameterType="Control" parameterSource="p_module_id" omitIfEmpty="True"/>
						<CustomParameter id="56" field="tooltip_text" dataType="Text" parameterType="Control" parameterSource="tooltip_text" omitIfEmpty="True"/>
						<CustomParameter id="57" field="listing_no" dataType="Text" parameterType="Control" parameterSource="listing_no" omitIfEmpty="True"/>
						<CustomParameter id="71" field="user_status_id" dataType="Text" parameterType="Control" parameterSource="user_status_id" omitIfEmpty="True"/>
<CustomParameter id="72" field="p_user_id" dataType="Float" parameterType="Control" parameterSource="p_user_id" omitIfEmpty="True"/>
<CustomParameter id="73" field="full_name" dataType="Text" parameterType="Control" parameterSource="full_name" omitIfEmpty="True"/>
<CustomParameter id="74" field="ip_address_4" dataType="Text" parameterType="Control" parameterSource="ip_address_4" omitIfEmpty="True"/>
<CustomParameter id="75" field="user_name" dataType="Text" parameterType="Control" parameterSource="user_name" omitIfEmpty="True"/>
</UFormElements>
					<DSPParameters/>
					<DSQLParameters/>
					<DConditions>
						<TableParameter id="58" conditionType="Parameter" useIsNull="False" field="p_user_id" dataType="Float" parameterType="URL" searchConditionType="Equal" logicOperator="And" orderNumber="1" parameterSource="p_user_id"/>
					</DConditions>
					<SecurityGroups>
						<Group id="59" groupID="1" read="True" insert="True" update="True" delete="True"/>
					</SecurityGroups>
					<Attributes/>
					<Features/>
				</Record>
				<Panel id="84" visible="True" generateDiv="False" name="LovContainer" PathID="ContentLovContainer">
					<Components>
						<IncludePage id="19" name="modal_start" PathID="ContentLovContainermodal_start" page="../Designs/modal/modal_start.ccp">
							<Components/>
							<Events/>
							<Features/>
						</IncludePage>
						<Panel id="12" visible="Dynamic" generateDiv="False" name="LovAjaxPanel" PathID="ContentLovContainerLovAjaxPanel" features="(assigned)">
							<Components>
							</Components>
							<Events/>
							<Attributes/>
							<Features>
								<JUpdatePanel id="85" enabled="True" childrenAsTriggers="False" name="JUpdatePanel1" category="jQuery" ccsIdsOnly="False" featureNameChanged="No">
									<Components/>
									<Events/>
									<ControlPoints/>
									<Features/>
								</JUpdatePanel>
							</Features>
						</Panel>
						<IncludePage id="86" name="modal_end" PathID="ContentLovContainermodal_end" page="../Designs/modal/modal_end.ccp">
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
		<CodeFile id="Code" language="PHPTemplates" name="p_user_form.php" forShow="True" url="p_user_form.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_user_form_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
