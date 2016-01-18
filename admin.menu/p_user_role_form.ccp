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
				<Record id="4" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="roleForm" connection="hrcon" dataSource="SELECT a.*, b.code , c.user_name
FROM p_user_role AS a
LEFT JOIN p_role AS b ON a.p_role_id = b.p_role_id
LEFT JOIN p_user AS c ON a.p_user_id = c.p_user_id
WHERE a.p_user_role_id = {p_user_role_id}
" errorSummator="Error" allowCancel="True" recordDeleteConfirmation="True" buttonsType="button" wizardRecordKey="p_role_id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Role" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" templatePageRecord="C:/Program Files (x86)/CodeChargeStudio5/Templates/Record/Dialog.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="ContentroleForm" returnPage="p_user_role.ccp" parameterTypeListName="ParameterTypeList" activeCollection="DConditions" customInsertType="Table" activeTableType="customDelete" customInsert="p_user_role" customUpdateType="Table" customUpdate="p_user_role" customDeleteType="Table" customDelete="p_user_role">
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
						<TextBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="code" fieldSource="code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="Code" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormcode">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<Hidden id="17" fieldSourceType="DBColumn" dataType="Float" name="p_user_role_id" PathID="ContentroleFormp_user_role_id" fieldSource="p_user_role_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
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
						<TextBox id="61" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="user_name" fieldSource="user_name" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Created By" caption="Created By" required="False" unique="False" wizardSize="32" wizardMaxLength="32" PathID="ContentroleFormuser_name">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="70"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</TextBox>
						<Hidden id="67" fieldSourceType="DBColumn" dataType="Text" name="p_role_id" PathID="ContentroleFormp_role_id" fieldSource="p_role_id" required="True" caption="Role">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="69" fieldSourceType="DBColumn" dataType="Text" name="p_user_id" PathID="ContentroleFormp_user_id" fieldSource="p_user_id" required="True">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<TextBox id="75" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="valid_from" fieldSource="valid_from" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="Awal Berlaku" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormvalid_from" format="dd-mmm-yyyy">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="76" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="valid_to" fieldSource="valid_to" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="Code" required="False" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormvalid_to" format="dd-mmm-yyyy">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextArea id="77" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="description" PathID="ContentroleFormdescription" fieldSource="description">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextArea>
						<DatePicker id="78" name="DatePicker_valid_from1" PathID="ContentroleFormDatePicker_valid_from1" control="valid_from" wizardDatePickerType="Image" wizardPicture="{CCS_PathToMasterPage}/Images/DatePicker.png">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</DatePicker>
						<DatePicker id="79" name="DatePicker_valid_to1" PathID="ContentroleFormDatePicker_valid_to1" control="valid_to" wizardDatePickerType="Image" wizardPicture="{CCS_PathToMasterPage}/Images/DatePicker.png">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</DatePicker>
					</Components>
					<Events/>
					<TableParameters>
					</TableParameters>
					<SPParameters/>
					<SQLParameters>
						<SQLParameter id="80" dataType="Text" parameterSource="p_user_role_id" parameterType="URL" variable="p_user_role_id"/>
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
						<SQLParameter id="28" variable="p_role_id" dataType="Text" parameterType="Control" parameterSource="p_role_id"/>
						<SQLParameter id="93" variable="p_user_role_id" dataType="Float" parameterType="Control" parameterSource="p_user_role_id"/>
<SQLParameter id="94" variable="user_name" dataType="Text" parameterType="Control" parameterSource="user_name"/>
<SQLParameter id="95" variable="p_user_id" dataType="Text" parameterType="Control" parameterSource="p_user_id"/>
<SQLParameter id="96" variable="valid_from" dataType="Date" parameterType="Control" parameterSource="valid_from" format="dd-mmm-yyyy"/>
<SQLParameter id="97" variable="valid_to" dataType="Date" parameterType="Control" parameterSource="valid_to" format="dd-mmm-yyyy"/>
</ISQLParameters>
					<IFormElements>
						<CustomParameter id="81" field="code" dataType="Text" parameterType="Control" parameterSource="code"/>
<CustomParameter id="82" field="p_user_role_id" dataType="Float" parameterType="Control" parameterSource="p_user_role_id"/>
<CustomParameter id="83" field="created_by" dataType="Text" parameterType="Control" parameterSource="created_by"/>
<CustomParameter id="84" field="creation_date" dataType="Date" parameterType="Control" parameterSource="creation_date" format="dd-mmm-yyyy"/>
<CustomParameter id="85" field="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by"/>
<CustomParameter id="86" field="updated_date" dataType="Date" parameterType="Control" parameterSource="updated_date" format="dd-mmm-yyyy"/>
<CustomParameter id="87" field="user_name" dataType="Text" parameterType="Control" parameterSource="user_name"/>
<CustomParameter id="88" field="p_role_id" dataType="Text" parameterType="Control" parameterSource="p_role_id"/>
<CustomParameter id="89" field="p_user_id" dataType="Text" parameterType="Control" parameterSource="p_user_id"/>
<CustomParameter id="90" field="valid_from" dataType="Date" parameterType="Control" parameterSource="valid_from" format="dd-mmm-yyyy"/>
<CustomParameter id="91" field="valid_to" dataType="Date" parameterType="Control" parameterSource="valid_to" format="dd-mmm-yyyy"/>
<CustomParameter id="92" field="description" dataType="Text" parameterType="Control" parameterSource="description"/>
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
						<TableParameter id="110" conditionType="Parameter" useIsNull="False" field="p_user_role_id" dataType="Float" searchConditionType="Equal" parameterType="Control" logicOperator="And" parameterSource="p_user_role_id"/>
</UConditions>
					<UFormElements>
						<CustomParameter id="98" field="code" dataType="Text" parameterType="Control" parameterSource="code" omitIfEmpty="True"/>
<CustomParameter id="99" field="p_user_role_id" dataType="Float" parameterType="Control" parameterSource="p_user_role_id" omitIfEmpty="True"/>
<CustomParameter id="100" field="created_by" dataType="Text" parameterType="Control" parameterSource="created_by" omitIfEmpty="True"/>
<CustomParameter id="101" field="creation_date" dataType="Date" parameterType="Control" parameterSource="creation_date" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="102" field="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by" omitIfEmpty="True"/>
<CustomParameter id="103" field="updated_date" dataType="Date" parameterType="Control" parameterSource="updated_date" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="104" field="user_name" dataType="Text" parameterType="Control" parameterSource="user_name" omitIfEmpty="True"/>
<CustomParameter id="105" field="p_role_id" dataType="Text" parameterType="Control" parameterSource="p_role_id" omitIfEmpty="True"/>
<CustomParameter id="106" field="p_user_id" dataType="Text" parameterType="Control" parameterSource="p_user_id" omitIfEmpty="True"/>
<CustomParameter id="107" field="valid_from" dataType="Date" parameterType="Control" parameterSource="valid_from" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="108" field="valid_to" dataType="Date" parameterType="Control" parameterSource="valid_to" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="109" field="description" dataType="Text" parameterType="Control" parameterSource="description" omitIfEmpty="True"/>
</UFormElements>
					<DSPParameters/>
					<DSQLParameters/>
					<DConditions>
						<TableParameter id="111" conditionType="Parameter" useIsNull="False" field="p_user_role_id" dataType="Float" searchConditionType="Equal" parameterType="Control" logicOperator="And" parameterSource="p_user_role_id"/>
<TableParameter id="112" conditionType="Parameter" useIsNull="False" field="p_user_role_id" dataType="Float" searchConditionType="Equal" parameterType="Control" logicOperator="And" parameterSource="p_user_role_id"/>
</DConditions>
					<SecurityGroups>
						<Group id="59" groupID="1" read="True" insert="True" update="True" delete="True"/>
					</SecurityGroups>
					<Attributes/>
					<Features/>
				</Record>
				<Panel id="62" visible="True" generateDiv="False" name="LovContainer" PathID="ContentLovContainer">
					<Components>
						<IncludePage id="63" name="modal_start" PathID="ContentLovContainermodal_start" page="../Designs/modal/modal_start.ccp">
							<Components/>
							<Events/>
							<Features/>
						</IncludePage>
						<Panel id="64" visible="Dynamic" generateDiv="False" name="LovAjaxPanel" PathID="ContentLovContainerLovAjaxPanel" features="(assigned)">
							<Components>
							</Components>
							<Events/>
							<Attributes/>
							<Features>
								<JUpdatePanel id="65" enabled="True" childrenAsTriggers="False" name="JUpdatePanel1" category="jQuery" ccsIdsOnly="False" featureNameChanged="No">
									<Components/>
									<Events/>
									<ControlPoints/>
									<Features/>
								</JUpdatePanel>
							</Features>
						</Panel>
						<IncludePage id="66" name="modal_end" PathID="ContentLovContainermodal_end" page="../Designs/modal/modal_end.ccp">
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
		<CodeFile id="Events" language="PHPTemplates" name="p_user_role_form_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_user_role_form.php" forShow="True" url="p_user_role_form.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
