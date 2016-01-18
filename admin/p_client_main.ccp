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
				<Record id="7" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="p_client" connection="hrcon" dataSource="p_client" errorSummator="Error" allowCancel="True" recordDeleteConfirmation="True" buttonsType="button" wizardRecordKey="p_client_id" encryptPasswordField="False" wizardUseInterVariables="True" pkIsAutoincrement="True" wizardCaption="{res:p_client_RecordForm}" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="False" recordDirection="Vertical" templatePageRecord="C:/Program Files (x86)/CodeChargeStudio5/Templates/Record/Dialog.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="Contentp_client" returnPage="p_client_list.ccp" customInsertType="SQL" customInsert="INSERT INTO p_client
(p_client_id,
code, 
client_name, 
description, 
creation_date, 
updated_date, updated_by, created_by) 
VALUES(
generate_id('chumanis','p_client','p_client_id'),
'{code}', 
'{client_name}', 
'{description}', 
Current_Date, 
Current_Date, 
'{updated_by}', 
'{created_by}')" parameterTypeListName="ParameterTypeList" activeCollection="ISQLParameters">
					<Components>
						<Button id="9" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="Contentp_clientButton_Insert">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="10" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="Contentp_clientButton_Update">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="11" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="Contentp_clientButton_Delete">
							<Components/>
							<Events>
								<Event name="OnClick" type="Client">
									<Actions>
										<Action actionName="Confirmation Message" actionCategory="General" id="12" message="{res:CCS_DeleteConfirmation}"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="13" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="{res:CCS_Cancel}" PathID="Contentp_clientButton_Cancel">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<TextBox id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="code" fieldSource="code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="{res:code}" caption="{res:code}" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="Contentp_clientcode">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="client_name" fieldSource="client_name" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="{res:client_name}" caption="{res:client_name}" required="True" unique="False" wizardSize="50" wizardMaxLength="128" PathID="Contentp_clientclient_name">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="description" fieldSource="description" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="{res:description}" caption="{res:description}" required="False" unique="False" wizardSize="50" wizardMaxLength="128" PathID="Contentp_clientdescription">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="creation_date" fieldSource="creation_date" wizardIsPassword="False" wizardUseTemplateBlock="False" features="(assigned)" wizardCaption="{res:creation_date}" caption="{res:creation_date}" required="True" format="dd/mm/yyyy" unique="False" wizardSize="8" wizardMaxLength="100" PathID="Contentp_clientcreation_date" defaultValue="CurrentDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features>
								<JDateTimePicker id="19" show_weekend="True" name="InlineDatePicker1" category="jQuery" enabled="True">
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
						<TextBox id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="updated_date" fieldSource="updated_date" wizardIsPassword="False" wizardUseTemplateBlock="False" features="(assigned)" wizardCaption="{res:updated_date}" caption="{res:updated_date}" required="True" format="dd/mm/yyyy" unique="False" wizardSize="8" wizardMaxLength="100" PathID="Contentp_clientupdated_date" defaultValue="CurrentDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features>
								<JDateTimePicker id="22" show_weekend="True" name="InlineDatePicker2" category="jQuery" enabled="True">
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
						<TextBox id="23" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="updated_by" fieldSource="updated_by" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="{res:updated_by}" caption="{res:updated_by}" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="Contentp_clientupdated_by" defaultValue="ccGetsession(&quot;UserLogin&quot;)">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="20" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="created_by" caption="{res:created_by}" fieldSource="created_by" required="True" unique="False" PathID="Contentp_clientcreated_by" defaultValue="ccGetsession(&quot;UserLogin&quot;)">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
					</Components>
					<Events/>
					<TableParameters>
						<TableParameter id="14" conditionType="Parameter" useIsNull="False" field="p_client_id" parameterSource="p_client_id" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="8" tableName="p_client"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<PKFields/>
					<ISPParameters/>
					<ISQLParameters>
						<SQLParameter id="31" variable="code" dataType="Text" parameterType="Control" parameterSource="code"/>
						<SQLParameter id="32" variable="client_name" dataType="Text" parameterType="Control" parameterSource="client_name"/>
						<SQLParameter id="33" variable="description" dataType="Text" parameterType="Control" parameterSource="description"/>
						<SQLParameter id="36" variable="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by"/>
						<SQLParameter id="37" variable="created_by" dataType="Text" parameterType="Control" parameterSource="created_by"/>
					</ISQLParameters>
					<IFormElements>
						<CustomParameter id="24" field="code" dataType="Text" parameterType="Control" parameterSource="code"/>
						<CustomParameter id="25" field="client_name" dataType="Text" parameterType="Control" parameterSource="client_name"/>
						<CustomParameter id="26" field="description" dataType="Text" parameterType="Control" parameterSource="description"/>
						<CustomParameter id="27" field="creation_date" dataType="Date" parameterType="Control" parameterSource="creation_date" format="dd/mm/yyyy"/>
						<CustomParameter id="28" field="updated_date" dataType="Date" parameterType="Control" parameterSource="updated_date" format="dd/mm/yyyy"/>
						<CustomParameter id="29" field="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by"/>
						<CustomParameter id="30" field="created_by" dataType="Text" parameterType="Control" parameterSource="created_by"/>
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
		<CodeFile id="Code" language="PHPTemplates" name="p_client_main.php" forShow="True" url="p_client_main.php" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
