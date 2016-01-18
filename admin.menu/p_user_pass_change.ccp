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
				<Record id="4" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="roleForm" connection="hrcon" dataSource="p_user" errorSummator="Error" allowCancel="True" recordDeleteConfirmation="True" buttonsType="button" wizardRecordKey="p_role_id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Role" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" templatePageRecord="C:/Program Files (x86)/CodeChargeStudio5/Templates/Record/Dialog.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="ContentroleForm" returnPage="p_user_pass_change.ccp" parameterTypeListName="ParameterTypeList" activeCollection="DConditions" customInsertType="SQL" activeTableType="customDelete" customUpdateType="Table" customUpdate="p_user" customDeleteType="Table" customDelete="p_user" customInsert="INSERT INTO p_user(user_pwd, p_user_id, user_pwd, user_pwd, user_name) VALUES('{new_password2}', {p_user_id}, '{old_password}', '{new_password}', '{user_name}')">
					<Components>
						<Button id="5" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="ContentroleFormButton_Insert">
							<Components/>
							<Events>
								<Event name="OnClick" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="73"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="6" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="ContentroleFormButton_Update">
							<Components/>
							<Events>
<Event name="OnClick" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="91"/>
</Actions>
</Event>
</Events>
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
						<TextBox id="13" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="new_password2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Creation Date" caption="new_password2" required="False" unique="False" wizardSize="8" wizardMaxLength="100" PathID="ContentroleFormnew_password2" generateDiv="False" fieldSource="user_pwd">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<Hidden id="17" fieldSourceType="DBColumn" dataType="Float" name="p_user_id" PathID="ContentroleFormp_user_id" fieldSource="p_user_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<TextBox id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="old_password" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="Password Lama" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormold_password" fieldSource="user_pwd">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="new_password" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="Password Baru" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormnew_password" fieldSource="user_pwd">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="65" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="user_name" fieldSource="user_name" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="User Name" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormuser_name" defaultValue="CCGetUserLogin()">
							<Components/>
							<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="92"/>
</Actions>
</Event>
</Events>
							<Attributes/>
							<Features/>
						</TextBox>
					</Components>
					<Events/>
					<TableParameters>
						<TableParameter id="63" conditionType="Parameter" useIsNull="False" dataType="Float" field="p_user_id" logicOperator="And" parameterSource="UserID" parameterType="Session" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="66" tableName="p_user"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="64" fieldName="*"/>
					</Fields>
					<PKFields/>
					<ISPParameters/>
					<ISQLParameters>
						<SQLParameter id="86" variable="new_password2" dataType="Text" parameterType="Control" parameterSource="new_password2"/>
						<SQLParameter id="87" variable="p_user_id" dataType="Float" parameterType="Control" parameterSource="p_user_id"/>
						<SQLParameter id="88" variable="old_password" dataType="Text" parameterType="Control" parameterSource="old_password"/>
						<SQLParameter id="89" variable="new_password" dataType="Text" parameterType="Control" parameterSource="new_password"/>
						<SQLParameter id="90" variable="user_name" dataType="Text" parameterType="Control" parameterSource="user_name"/>
					</ISQLParameters>
					<IFormElements>
						<CustomParameter id="74" field="user_pwd" dataType="Text" parameterType="Control" parameterSource="new_password2" omitIfEmpty="True"/>
						<CustomParameter id="75" field="p_user_id" dataType="Float" parameterType="Control" parameterSource="p_user_id" omitIfEmpty="True"/>
						<CustomParameter id="76" field="user_pwd" dataType="Text" parameterType="Control" parameterSource="old_password" omitIfEmpty="True"/>
						<CustomParameter id="77" field="user_pwd" dataType="Text" parameterType="Control" parameterSource="new_password" omitIfEmpty="True"/>
						<CustomParameter id="78" field="user_name" dataType="Text" parameterType="Control" parameterSource="user_name" omitIfEmpty="True"/>
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
						<TableParameter id="84" conditionType="Parameter" useIsNull="False" field="p_user_id" dataType="Float" searchConditionType="Equal" parameterType="Control" logicOperator="And" parameterSource="p_user_id"/>
					</UConditions>
					<UFormElements>
						<CustomParameter id="79" field="user_pwd" dataType="Text" parameterType="Control" parameterSource="new_password2" omitIfEmpty="True"/>
						<CustomParameter id="80" field="p_user_id" dataType="Float" parameterType="Control" parameterSource="p_user_id" omitIfEmpty="True"/>
						<CustomParameter id="81" field="user_pwd" dataType="Text" parameterType="Control" parameterSource="old_password" omitIfEmpty="True"/>
						<CustomParameter id="82" field="user_pwd" dataType="Text" parameterType="Control" parameterSource="new_password" omitIfEmpty="True"/>
						<CustomParameter id="83" field="user_name" dataType="Text" parameterType="Control" parameterSource="user_name" omitIfEmpty="True"/>
					</UFormElements>
					<DSPParameters/>
					<DSQLParameters/>
					<DConditions>
						<TableParameter id="85" conditionType="Parameter" useIsNull="False" field="p_user_id" dataType="Float" searchConditionType="Equal" parameterType="Control" logicOperator="And" parameterSource="p_user_id"/>
					</DConditions>
					<SecurityGroups>
						<Group id="59" groupID="1" read="True" insert="True" update="True" delete="True"/>
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
		<CodeFile id="Code" language="PHPTemplates" name="p_user_pass_change.php" forShow="True" url="p_user_pass_change.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_user_pass_change_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
