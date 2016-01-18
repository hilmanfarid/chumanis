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
				<Record id="4" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="roleForm" connection="hrcon" dataSource="p_menu a" errorSummator="Error" allowCancel="True" recordDeleteConfirmation="True" buttonsType="button" wizardRecordKey="p_role_id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Role" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" templatePageRecord="C:/Program Files (x86)/CodeChargeStudio5/Templates/Record/Dialog.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="ContentroleForm" returnPage="p_menu.ccp" parameterTypeListName="ParameterTypeList" activeCollection="ISQLParameters" customInsertType="SQL" activeTableType="p_menu" customInsert="Select * from chumanis.f_crud_p_menu(
null,
{p_module_id},
'{code}',
'{parent_id}',
'{file_name}',    
{listing_no},
'{is_active}',
'{tooltip_text}',
'{description}',
'{struser}',
'C')" customUpdateType="SQL" customUpdate="Select * from chumanis.f_crud_p_menu(
{p_menu_id},
{p_module_id},
'{code}',
{parent_id},
'{file_name}',    
{listing_no},
'{is_active}',
'{tooltip_text}',
'{description}',
'{struser}',
'U')" customDeleteType="SQL" customDelete="Select * from chumanis.f_crud_p_menu(
{p_menu_id},
null,
null,
null,
null,    
null,
null,
null,
null,
null,
'D')" editableComponentTypeString="Record" orderBy="listing_no">
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
						<TextBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="code" fieldSource="code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="Nama Menu" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormcode">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextArea id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="description" fieldSource="description" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Description" caption="Keterangan" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="ContentroleFormdescription">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextArea>
						<Hidden id="17" fieldSourceType="DBColumn" dataType="Float" name="p_menu_id" PathID="ContentroleFormp_menu_id" fieldSource="p_menu_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<TextBox id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="tooltip_text" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="tooltip_text" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormtooltip_text">
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
						<Hidden id="70" fieldSourceType="DBColumn" dataType="Float" name="p_module_id" PathID="ContentroleFormp_module_id" fieldSource="p_module_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<TextBox id="79" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="file_name" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="file_name" required="False" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormfile_name" fieldSource="file_name">
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
						<TextBox id="101" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="parent_code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="Menu parent" required="False" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormparent_code" fieldSource="parent_code">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="80" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="parent_id" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="id parent" required="False" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormparent_id" fieldSource="parent_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="109" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="listing_no" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="Nomor Urut" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormlisting_no" fieldSource="listing_no" defaultValue="0">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
					</Components>
					<Events/>
					<TableParameters>
						<TableParameter id="122" conditionType="Parameter" useIsNull="False" dataType="Float" field="a.p_menu_id" logicOperator="And" orderNumber="1" parameterSource="p_menu_id" parameterType="URL" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="121" alias="a" posHeight="180" posLeft="10" posTop="10" posWidth="115" tableName="p_menu"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="123" alias="Expr1" fieldName="a.*" isExpression="True"/>
						<Field id="124" alias="parent_code" fieldName="(select code from p_menu x where x.p_menu_id = a.parent_id)" isExpression="True"/>
					</Fields>
					<PKFields/>
					<ISPParameters/>
					<ISQLParameters>
						<SQLParameter id="21" variable="code" dataType="Text" parameterType="Control" parameterSource="code"/>
						<SQLParameter id="22" variable="is_active" dataType="Text" parameterType="Control" parameterSource="is_active" defaultValue="'Y'"/>
						<SQLParameter id="23" variable="description" dataType="Text" parameterType="Control" parameterSource="description"/>
						<SQLParameter id="102" variable="p_menu_id" parameterType="Control" dataType="Integer" parameterSource="p_menu_id" defaultValue="0"/>
						<SQLParameter id="103" variable="p_module_id" parameterType="URL" dataType="Integer" parameterSource="p_module_id" defaultValue="0"/>
						<SQLParameter id="104" variable="parent_id" parameterType="Control" defaultValue="null" dataType="Text" parameterSource="parent_id"/>
						<SQLParameter id="105" variable="file_name" parameterType="Control" dataType="Text" parameterSource="file_name"/>
						<SQLParameter id="106" variable="listing_no" parameterType="Control" defaultValue="0" dataType="Integer" parameterSource="listing_no"/>
						<SQLParameter id="107" variable="tooltip_text" parameterType="Control" dataType="Text" parameterSource="tooltip_text"/>
						<SQLParameter id="108" variable="struser" parameterType="Session" dataType="Text" parameterSource="UserName"/>
					</ISQLParameters>
					<IFormElements>
						<CustomParameter id="62" field="code" dataType="Text" parameterType="Control" parameterSource="code" omitIfEmpty="True"/>
						<CustomParameter id="63" field="description" dataType="Text" parameterType="Control" parameterSource="description" omitIfEmpty="True"/>
						<CustomParameter id="64" field="creation_date" dataType="Date" parameterType="Control" parameterSource="creation_date" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="65" field="created_by" dataType="Text" parameterType="Control" parameterSource="created_by" omitIfEmpty="True"/>
						<CustomParameter id="66" field="updated_date" dataType="Date" parameterType="Control" parameterSource="updated_date" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="67" field="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by" omitIfEmpty="True"/>
						<CustomParameter id="69" field="is_active" dataType="Text" parameterType="Control" parameterSource="is_active" omitIfEmpty="True"/>
						<CustomParameter id="83" field="file_name" dataType="Text" parameterType="Control" parameterSource="file_name" omitIfEmpty="True"/>
						<CustomParameter id="84" field="parent_id" dataType="Text" parameterType="Control" parameterSource="parent_id" omitIfEmpty="True"/>
						<CustomParameter id="86" field="p_module_id" dataType="Float" parameterType="Control" parameterSource="p_module_id" omitIfEmpty="True"/>
					</IFormElements>
					<USPParameters/>
					<USQLParameters>
						<SQLParameter id="111" variable="p_menu_id" parameterType="Control" dataType="Integer" parameterSource="p_menu_id" defaultValue="0"/>
						<SQLParameter id="112" variable="p_module_id" parameterType="URL" dataType="Integer" parameterSource="p_module_id" defaultValue="0"/>
						<SQLParameter id="113" variable="code" parameterType="Control" dataType="Text" parameterSource="code"/>
						<SQLParameter id="114" variable="parent_id" parameterType="Control" defaultValue="null" dataType="Integer" parameterSource="parent_id"/>
						<SQLParameter id="115" variable="file_name" parameterType="Control" dataType="Text" parameterSource="file_name"/>
						<SQLParameter id="116" variable="listing_no" parameterType="Control" defaultValue="0" dataType="Integer" parameterSource="listing_no"/>
						<SQLParameter id="117" variable="is_active" parameterType="Control" dataType="Text" parameterSource="is_active"/>
						<SQLParameter id="118" variable="tooltip_text" parameterType="Control" dataType="Text" parameterSource="tooltip_text"/>
						<SQLParameter id="119" variable="description" parameterType="Control" dataType="Text" parameterSource="description"/>
						<SQLParameter id="120" variable="struser" parameterType="Session" dataType="Text" parameterSource="UserName"/>
					</USQLParameters>
					<UConditions>
						<TableParameter id="47" conditionType="Parameter" useIsNull="False" field="p_menu_id" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="p_menu_id"/>
					</UConditions>
					<UFormElements>
						<CustomParameter id="71" field="code" dataType="Text" parameterType="Control" parameterSource="code" omitIfEmpty="True"/>
						<CustomParameter id="72" field="description" dataType="Text" parameterType="Control" parameterSource="description" omitIfEmpty="True"/>
						<CustomParameter id="73" field="creation_date" dataType="Date" parameterType="Control" parameterSource="creation_date" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="74" field="created_by" dataType="Text" parameterType="Control" parameterSource="created_by" omitIfEmpty="True"/>
						<CustomParameter id="75" field="updated_date" dataType="Date" parameterType="Control" parameterSource="updated_date" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="76" field="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by" omitIfEmpty="True"/>
						<CustomParameter id="78" field="is_active" dataType="Text" parameterType="Control" parameterSource="is_active" omitIfEmpty="True"/>
						<CustomParameter id="88" field="file_name" dataType="Text" parameterType="Control" parameterSource="file_name" omitIfEmpty="True"/>
						<CustomParameter id="89" field="parent_id" dataType="Text" parameterType="Control" parameterSource="parent_id" omitIfEmpty="True"/>
					</UFormElements>
					<DSPParameters/>
					<DSQLParameters>
						<SQLParameter id="110" variable="p_menu_id" parameterType="Control" dataType="Text" parameterSource="p_menu_id"/>
					</DSQLParameters>
					<DConditions>
						<TableParameter id="58" conditionType="Parameter" useIsNull="False" field="p_menu_id" dataType="Float" parameterType="URL" searchConditionType="Equal" logicOperator="And" orderNumber="1" parameterSource="p_menu_id"/>
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
		<CodeFile id="Code" language="PHPTemplates" name="p_menu_from.php" forShow="True" url="p_menu_from.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
