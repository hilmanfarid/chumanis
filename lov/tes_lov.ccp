<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\lov" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="None" wizardThemeVersion="3.0" useDesign="False" masterPage="../Designs/d01/MasterPage.ccp" needGeneration="0">
	<Components>
		<Panel id="8" visible="True" generateDiv="False" name="Head" contentPlaceholder="Head">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="9" visible="True" generateDiv="False" name="Content" contentPlaceholder="Content">
			<Components>
				<Record id="2" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="NewRecord1" actionPage="tes_lov" errorSummator="Error" wizardFormMethod="post" PathID="ContentNewRecord1">
					<Components>
						<TextBox id="3" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TextBox1" PathID="ContentNewRecord1TextBox1">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="ContentNewRecord1Button_Insert">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="5" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="ContentNewRecord1Button_Update">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="6" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="ContentNewRecord1Button_Delete">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<TextBox id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TextBox2" PathID="ContentNewRecord1TextBox2">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
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
				<Panel id="18" visible="True" generateDiv="False" name="LovContainer" PathID="ContentLovContainer">
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
								<JUpdatePanel id="13" enabled="True" childrenAsTriggers="False" name="JUpdatePanel2" category="jQuery" ccsIdsOnly="False" featureNameChanged="No">
									<Components/>
									<Events/>
									<ControlPoints/>
									<Features/>
								</JUpdatePanel>
							</Features>
						</Panel>
						<IncludePage id="17" name="modal_end" PathID="ContentLovContainermodal_end" page="../Designs/modal/modal_end.ccp">
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
		<CodeFile id="Code" language="PHPTemplates" name="tes_lov.php" forShow="True" url="tes_lov.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="tes_lov_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
