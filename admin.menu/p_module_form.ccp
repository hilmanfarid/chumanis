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
				<Record id="4" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="roleForm" connection="hrcon" dataSource="p_module" errorSummator="Error" allowCancel="True" recordDeleteConfirmation="True" buttonsType="button" wizardRecordKey="p_role_id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Role" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" templatePageRecord="C:/Program Files (x86)/CodeChargeStudio5/Templates/Record/Dialog.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="ContentroleForm" returnPage="p_module.ccp" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customInsertType="SQL" activeTableType="customDelete" customInsert="Select * from chumanis.f_crud_p_module(
null,
'{code}',
{listing_no},
'{is_active}',
null,
'{tooltip_text}',
'{description}',
'{struser}',
'C')" customUpdateType="SQL" customUpdate="Select * from chumanis.f_crud_p_module(
{p_module_id},
'{code}',
{listing_no},
'{is_active}',
null,
'{tooltip_text}',
'{description}',
'{struser}',
'U')" customDeleteType="SQL" customDelete="Select * from chumanis.f_crud_p_module(
{p_module_id},
null,
null,
null,
null,
null,
null,
null,
'D')">
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
						<TextBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="code" fieldSource="code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="Code" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormcode">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<ListBox id="11" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="is_active" fieldSource="is_active" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Is Active" caption="Is Active" required="True" unique="False" connection="hrcon" wizardEmptyCaption="Select Value" PathID="ContentroleFormis_active" dataSource="Y;ENABLE;N;DISABLE">
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
						<TextArea id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="description" fieldSource="description" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Description" caption="Description" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="ContentroleFormdescription">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextArea>
						<Hidden id="17" fieldSourceType="DBColumn" dataType="Float" name="p_module_id" PathID="ContentroleFormp_module_id" fieldSource="p_module_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<TextBox id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="tooltip_text" fieldSource="tooltip_text" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="tooltip_text" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormtooltip_text">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="listing_no" fieldSource="listing_no" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="listing_no" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormlisting_no">
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
					</Components>
					<Events/>
					<TableParameters>
						<TableParameter id="61" conditionType="Parameter" useIsNull="False" dataType="Float" field="p_module_id" logicOperator="And" orderNumber="1" parameterSource="p_module_id" parameterType="URL" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="60" posHeight="180" posLeft="10" posTop="10" posWidth="116" tableName="p_module"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="62" fieldName="*"/>
					</Fields>
					<PKFields/>
					<ISPParameters/>
					<ISQLParameters>
						<SQLParameter id="21" variable="code" dataType="Text" parameterType="Control" parameterSource="code"/>
						<SQLParameter id="22" variable="is_active" dataType="Text" parameterType="Control" parameterSource="is_active"/>
						<SQLParameter id="23" variable="description" dataType="Text" parameterType="Control" parameterSource="description"/>
						<SQLParameter id="63" variable="struser" parameterType="Session" dataType="Text" parameterSource="UserName"/>
						<SQLParameter id="64" variable="listing_no" parameterType="Control" defaultValue="null" dataType="Integer" parameterSource="listing_no"/>
						<SQLParameter id="65" variable="tooltip_text" parameterType="Control" dataType="Text" parameterSource="tooltip_text"/>
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
					</IFormElements>
					<USPParameters/>
					<USQLParameters>
						<SQLParameter id="39" variable="code" dataType="Text" parameterType="Control" parameterSource="code"/>
						<SQLParameter id="40" variable="is_active" dataType="Text" parameterType="Control" parameterSource="is_active"/>
						<SQLParameter id="41" variable="description" dataType="Text" parameterType="Control" parameterSource="description"/>
						<SQLParameter id="45" variable="struser" dataType="Text" parameterType="Session" parameterSource="UserName"/>
						<SQLParameter id="46" variable="p_module_id" dataType="Integer" parameterType="URL" parameterSource="p_module_id" defaultValue="0"/>
						<SQLParameter id="66" variable="listing_no" parameterType="Control" defaultValue="0" dataType="Integer" parameterSource="listing_no"/>
						<SQLParameter id="67" variable="tooltip_text" parameterType="Control" dataType="Text" parameterSource="tooltip_text"/>
					</USQLParameters>
					<UConditions>
						<TableParameter id="47" conditionType="Parameter" useIsNull="False" field="p_module_id" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="p_module_id"/>
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
					</UFormElements>
					<DSPParameters/>
					<DSQLParameters>
						<SQLParameter id="68" variable="p_module_id" parameterType="URL" dataType="Integer" parameterSource="p_module_id" defaultValue="0"/>
					</DSQLParameters>
					<DConditions>
						<TableParameter id="58" conditionType="Parameter" useIsNull="False" field="p_module_id" dataType="Float" parameterType="URL" searchConditionType="Equal" logicOperator="And" orderNumber="1" parameterSource="p_module_id"/>
					</DConditions>
					<SecurityGroups>
						<Group id="59" groupID="1" read="True" insert="True" update="True" delete="True"/>
					</SecurityGroups>
					<Attributes/>
					<Features/>
				</Record>
				<IncludePage id="69" name="NewPage1" PathID="ContentNewPage1" page="../admin/NewPage1.ccp">
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
		<CodeFile id="Code" language="PHPTemplates" name="p_module_form.php" forShow="True" url="p_module_form.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
