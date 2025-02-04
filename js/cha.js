console.log("Updated at 2025.02.04 11:30+-")
console.log(" ███  ███                               \n\
 ███  ███                               \n\
 ███▒▒███                               \n\
 ███▓▓███   ░████░    ░████░            \n\
 ██▓██▓██  ░██████░  ░██████░           \n\
 ██▒██▒██  ███  ███  ███  ███  ▒███▒  █ \n\
 ██░██░██  ██░  ░██  ██░  ░██  ████████ \n\
 ██ ██ ██  ██    ██  ██    ██  ▓  ▒███▒ \n\
 ██    ██  ██░  ░██  ██░  ░██           \n\
 ██    ██  ███  ███  ███  ███           \n\
 ██    ██  ░██████░  ░██████░           \n\
 ██    ██   ░████░    ░████░      ")
function showAbout() {
    var dialog = new mdui.Dialog('#aboutDialog');
    dialog.open();
}

document.addEventListener('DOMContentLoaded', function() {
    const container = document.querySelector('.container');
    container.style.gridTemplateColumns = `repeat(${columns}, 1fr)`;
});


                const constants = {
"5aaafcea-684f-4310-936d-67ae35956c48": { constant: -1, category: "Ø", name: "驟雨の狭間" },
"1104f25d-2493-4bc7-9172-b262d36488ac": { constant: -1, category: "SP", name: "Oiiaioooooiai" },
"e543f4a5-5f55-45e5-9c41-ebe1c155c12e": { constant: -1, category: "SP", name: "Dogbite" },
"6252f7c4-8eae-4b59-a22f-9f142f904029": { constant: 12.3, category: "CL", name: "Contrasty Angeles" },
"d742e989-92c4-4474-87ef-57b218d0fc41": { constant: 12.2, category: "CL", name: "命日" },
"9acd5289-bc81-49fb-afc8-7b0631e60e60": { constant: 12.1, category: "CL", name: "Regnaissance" },
"a19a54b6-363e-49ae-9cd2-633a2db8ae4f": { constant: 11.9, category: "CL", name: "Broken Conviction" },
"eab07c23-395d-47f3-be33-15c7c566f694": { constant: 11.7, category: "CL", name: "Moonflutter" },
"ead657f6-f0f2-4a21-acfd-4322892a0562": { constant: 11.7, category: "CL", name: "Fly To Meteor feat.兔柒" },
"217898b1-4806-401f-adf5-740e9d72b66e": { constant: 10.5, category: "CL", name: "雨女" },
"cc75ce1c-dbed-4bc7-94eb-728bf36bb1ec": { constant: 12.1, category: "CB", name: "Innocent white" },
"97ef94ce-df45-4a92-9645-2456f606e0fa": { constant: 11.9, category: "CB", name: "Meltovt Necrosys" },
"ed40cd1b-2741-415a-be81-6fcc63db4044": { constant: 11.7, category: "CB", name: "HYPER MEMORIES" },
"ef55520f-c913-449f-bf26-ab947384127e": { constant: 11.5, category: "CB", name: "Broken Conviction" },
"269efa5f-8b69-4a71-be24-7abe57372b3f": { constant: 11.5, category: "CB", name: "Contrasty Angeles" },
"e0162d0e-0727-49c2-80fa-f611621650ea": { constant: 11.4, category: "CB", name: "slic.hertz #GdbG"},
"61f5e310-d45b-40dc-a934-e3a849382729": { constant: 11.4, category: "CB", name: "Moonflutter" },
"14080c32-a16c-464c-b24a-880f1a7e657d": { constant: 11.4, category: "CB", name: "Algebra" },
"6b478cca-035d-4297-b34a-ae75658d81bd": { constant: 11.3, category: "CB", name: "Fragment of Memories" },
"f425914c-db82-413c-aca9-96ff151b8605": { constant: 11.2, category: "CB", name: "IN" },
"da07cabf-7c7b-4083-a41a-879be13c8c94": { constant: 11.2, category: "CB", name: "イコラト" },
"01929c36-e7ba-40d5-8123-ca3d4c2da4fb": { constant: 11.2, category: "CB", name: "参宿四~Betelgeuse~" },
"04d821ff-493a-421d-83a5-a61a59b2d3d3": { constant: 11.1, category: "CB", name: "命日" },
"80df6e22-69c3-4983-a712-adeebb47fb2b": { constant: 11.1, category: "CB", name: "Regnaissance" },
"22bd5632-25cc-412f-9299-bcf2cdd64aed": { constant: 10.9, category: "CB", name: "樱落繁花" },
"f7b864bc-72a3-4c9d-ab7c-b57946fb77ec": { constant: 10.8, category: "CB", name: "Elsorhg" },
"aafec4af-3479-445b-9b30-b6822b9f5e19": { constant: 10.8, category: "CB", name: "Moving on" },
"a6ef2d0a-057b-4ada-be88-23dcde06ada5": { constant: 10.7, category: "CB", name: "Hikari" },
"6db4cb9b-adec-4ce5-bb0a-71d4761e88f8": { constant: 10.6, category: "CB", name: "WATER" },
"13fda58e-3091-4b3d-8eb9-4ac8346ce61a": { constant: 10.6, category: "CB", name: "Threat - Sky Islands" },
"35ab3fba-928d-4b08-be7f-2fc67a77a838": { constant: 10.5, category: "CB", name: "Fly To Meteor (Milthm Edit)" },
"7131ad7b-1602-4acd-bfc1-1ff712d054f0": { constant: 10.5, category: "CB", name: "Future Unbound (Game Edit)" },
"7c0cdf77-fcfa-4f96-9897-24ca10582c32": { constant: 10.3, category: "CB", name: "Threat - Superstructure" },
"7cdb8a2c-e133-4a91-a29f-4e21ba4e442a": { constant: 10.3, category: "CB", name: "Dogbite" },
"3a908e2d-8a39-4220-a6b8-4817bd1cea4a": { constant: 10.2, category: "CB", name: "cybernetic blazar" },
"b60f0788-f9af-4a41-8c73-2b72151d309f": { constant: 10.2, category: "CB", name: "Agnostic" },
"887157ea-fe1a-480b-b7e9-e6a4f9e27ae4": { constant: 10.1, category: "CB", name: "夜風" },
"130d1d7d-ba20-467c-b5f5-eafc51882809": { constant: 10.1, category: "CB", name: "Blueface" },
"c902851b-fa01-44f4-97a8-ab6d317fccd4": { constant: 10.0, category: "CB", name: "仮想明日" },
"03b883cf-f28b-4e33-8f67-d3bcb1a74719": { constant: 10.0, category: "CB", name: "Psyched Fevereiro" },
"fc40c7fc-e62a-4fa8-891e-430444191e26": { constant: 10.0, category: "CB", name: "OverRain" },
"8d787646-a290-4f14-a831-d7d43bc9f534": { constant: 9.8, category: "CB", name: "Rainbow Flavor!" },
"f728706a-e40a-421d-aaba-dde4bc35e8e3": { constant: 9.8, category: "CB", name: "Oniichan" },
"fa97e341-3a72-47bc-927e-b9cf87980b37": { constant: 9.7, category: "CB", name: "ネオン色のまち feat.Mai" },
"9e083951-188f-4998-951a-58d08b4b4f45": { constant: 9.7, category: "CB", name: "Jump out" },
"00e3e0b6-fbdd-4a7d-bcab-ba6540f4225d": { constant: 9.6, category: "CB", name: "白虎蓮華" },
"df4ff6fe-a8da-4b63-b0bd-b69ac8d80ace": { constant: 9.6, category: "CB", name: "Bio-Engineering" },
"9a55b865-0860-41b9-9f78-bc5209bc9f44": { constant: 9.5, category: "CB", name: "雨女" },
"ca4c79a7-709a-40c5-b0e0-c04b6deff431": { constant: 9.4, category: "CB", name: "烁雨" },
"c3769378-d595-4119-b93c-e0db2b3ea8e2": { constant: 9.3, category: "CB", name: "Aconsma" },
"cdacaee4-2866-4109-93a8-5bbbf0dc6207": { constant: 9.3, category: "CB", name: "花月" },
"d70bc3b4-752a-45b9-bd31-c6ab8b9a7c9e": { constant: 9.2, category: "CB", name: "INFP.mp3" },
"725abac1-5de5-463f-870d-a99a41cae61e": { constant: 9.1, category: "CB", name: "暮予星光"},
"bb5b7628-87b1-4e1c-8e07-8bacadf6f2b1": { constant: 8.6, category: "CB", name: "サイクルの欠片"},
"b2594118-dcf5-4750-9e57-e4eeef6142fe": { constant: 8.5, category: "CB", name: "时落之雨" },
"6df0b462-dded-46db-8505-3ff86fc46c26": { constant: 8.3, category: "CB", name: "粗线条的雨" },
"35b424f8-d0de-41ab-9512-f365a154c328": { constant: 8.3, category: "CB", name: "Words" },
"858f698c-4bd9-40f0-aa8b-793021e0c550": { constant: 7.5, category: "CB", name: "雨之城" },
"c18f27b6-2d4e-4631-82b1-4ede237874df": { constant: 9.0, category: "SK", name: "Contrasty Angeles" },
"0785d07e-50e1-4e3f-b1aa-01fa43d0c2f6": { constant: 8.9, category: "SK", name: "HYPER MEMORIES" },
"c9a9bc45-8695-4fb9-babe-d2027a6d9ed7": { constant: 8.8, category: "SK", name: "樱落繁花" },
"2cfa74ee-7e6d-4ebf-8f0a-e7cfb3a7e94c": { constant: 8.7, category: "SK", name: "イコラト" },
"63b8512d-ac16-4026-bfee-1317d860ab82": { constant: 8.7, category: "SK", name: "命日" },
"de2327c7-0d63-496f-9974-dbb70bfcbed8": { constant: 8.6, category: "SK", name: "Broken Conviction" },
"a5a9a7e4-3030-4bb3-9eef-04e58a0fbdb4": { constant: 8.5, category: "SK", name: "Regnaissance" },
"2022fd8f-3210-4151-8636-8ec888236214": { constant: 8.4, category: "SK", name: "Hikari" },
"de74f367-3a91-4421-a657-f0e8268083a3": { constant: 8.4, category: "SK", name: "Fragment of Memories" },
"9953c1b3-f92a-406c-8ea6-78dbee1b8f71": { constant: 8.3, category: "SK", name: "Bio-Engineering" },
"d6514d67-18d3-4d8e-8492-890061efb6f7": { constant: 8.2, category: "SK", name: "花月" },
"14700dda-b3c7-429d-a5ce-8a65f2fe4846": { constant: 8.2, category: "SK", name: "Innocent white" },
"962ec79e-489c-43ea-bd72-6dc3448e3983": { constant: 8.1, category: "SK", name: "Algebra" },
"d89765a7-05a1-44a1-8ed3-f23f5f15741a": { constant: 8.0, category: "SK", name: "Blueface" },
"4001a2b3-374d-438e-8e2b-2bd6d3651805": { constant: 8.0, category: "SK", name: "ネオン色のまち feat.Mai" },
"44405d3d-4162-4fb8-9e86-fc7c965d4d2d": { constant: 8.0, category: "SK", name: "Oniichan" },
"e663eb53-66d4-4a76-b533-445ef08ee18e": { constant: 7.9, category: "SK", name: "IN" },
"38b25a54-afa9-4369-b286-90ba2e29df0b": { constant: 7.9, category: "SK", name: "Jump out" },
"dae03da2-2ff0-4ed1-9624-945c2b9d3118": { constant: 7.9, category: "SK", name: "Moonflutter" },
"e7ec6340-be44-44ab-8545-d5b7cf326fd4": { constant: 7.8, category: "SK", name: "Meltovt Necrosys" },
"e75e2d80-86a0-464f-8d29-8dd0bb68328b": { constant: 7.8, category: "SK", name: "サイクルの欠片"},
"b1361177-1426-47cc-b036-afd09cad775b": { constant: 7.8, category: "SK", name: "cybernetic blazar" },
"fccd5960-dbdc-4127-8b0b-58c1fb521354": { constant: 7.6, category: "SK", name: "OverRain" },
"26a76638-ec89-4809-bd40-5d6afe403c40": { constant: 7.6, category: "SK", name: "slic.hertz #GdbG"},
"640cea92-0024-4ba5-aa16-8a38f77743ac": { constant: 7.5, category: "SK", name: "Elsorhg" },
"ac9308f8-b896-43af-879a-b65bcfcaa874": { constant: 7.5, category: "SK", name: "Rainbow Flavor!" },
"bdf2975e-8b19-4af8-9b1c-dc6f62587e7c": { constant: 7.5, category: "SK", name: "暮予星光"},
"3442183b-cf7d-4842-9ddf-04243914916a": { constant: 7.5, category: "SK", name: "Future Unbound (Game Edit)" },
"9a75cbb5-f9ad-4557-b3ed-5553a16023d7": { constant: 7.4, category: "SK", name: "Agnostic" },
"fe111534-c651-4896-9538-2dd100131a7d": { constant: 7.3, category: "SK", name: "夜風" },
"b87796c3-a64e-4cfd-a57f-a35484a951e2": { constant: 7.3, category: "SK", name: "WATER" },
"9a8d5198-664a-418a-868b-b28d992c9b9e": { constant: 7.3, category: "SK", name: "Psyched Fevereiro" },
"9476c969-d02d-40ca-b64f-eb3efae43ee7": { constant: 7.0, category: "SK", name: "烁雨" },
"eb7a9055-b56f-46ba-9c30-0f9380d2f5b5": { constant: 6.9, category: "SK", name: "Threat - Sky Islands" },
"1ec80826-e11e-43af-acd3-c154212443b9": { constant: 6.6, category: "SK", name: "仮想明日" },
"9953eae4-4f60-4cfe-a8c3-9ada13a4b1ca": { constant: 6.5, category: "SK", name: "雨女" },
"508fff6a-32dc-4f6b-88c7-bbd86e639085": { constant: 6.5, category: "SK", name: "Fly To Meteor (Milthm Edit)" },
"296e3be3-1bdc-4568-a9d2-33ce9e0da9d4": { constant: 6.5, category: "SK", name: "Words" },
"5aac139b-ab96-486d-a081-6bfebe382932": { constant: 6.5, category: "SK", name: "Dogbite" },
"f28a654d-a2c4-4ff2-88f0-592ba52cd4fd": { constant: 6.5, category: "SK", name: "白虎蓮華" },
"81daeec2-c1ae-4218-97fa-f9796504dba9": { constant: 6.4, category: "SK", name: "参宿四~Betelgeuse~" },
"7d5df9f6-080f-4da0-974a-d2b8cb86e7e6": { constant: 6.3, category: "SK", name: "Moving on" },
"8f75c6ff-a5ac-4738-b5e9-2549fa838084": { constant: 6.0, category: "SK", name: "Aconsma" },
"8e72dab7-e72f-4842-a499-559659279e2c": { constant: 5.5, category: "SK", name: "Threat - Superstructure" },
"37a9f1a0-32d4-4f78-acae-1be9ca7ea42f": { constant: 5.5, category: "SK", name: "INFP.mp3" },
"54ea2f8f-ae05-4aba-a117-8d187bf08074": { constant: 4.5, category: "SK", name: "时落之雨" },
"7c30226f-0ea5-4b71-aab7-7fefca1070dd": { constant: 4.5, category: "SK", name: "Broken Conviction" },
"62c1cdc7-57c2-4a5f-809b-bcfb6c6a0469": { constant: 4.0, category: "SK", name: "粗线条的雨" },
"acdab435-5aa3-45de-a815-9dbb7cd13130": { constant: 4.0, category: "SK", name: "雨之城" },
"4144b702-77bd-4ff4-9ba0-aa7c70b2bab5": { constant: 4.5, category: "DZ", name: "Regnaissance" },
"ac138fef-ad0b-4d0d-883c-453e6fe11d37": { constant: 4.0, category: "DZ", name: "Contrasty Angeles" },
"cea79b8c-23fd-4fbd-b2a9-6f080ef15b44": { constant: 4.0, category: "DZ", name: "cybernetic blazar" },
"2d6e3256-818b-434e-9980-ee6fcf14a8c7": { constant: 4.0, category: "DZ", name: "Blueface" },
"5d23aa36-a3df-406f-980f-b6cd0cec5385": { constant: 3.5, category: "DZ", name: "仮想明日" },
"2484331f-4345-4f97-98ac-edda4be3f723": { constant: 3.5, category: "DZ", name: "Psyched Fevereiro" },
"5ab2ddde-5f3e-42ec-b626-1296680093d1": { constant: 3.5, category: "DZ", name: "ネオン色のまち feat.Mai" },
"375f0d93-82e2-4350-9b46-98c3dd836305": { constant: 3.0, category: "DZ", name: "雨女" },
"a8f6451b-eeb3-4cb4-898b-4a8c4233567f": { constant: 3.0, category: "DZ", name: "Oniichan" },
"794c0460-7a5e-4ffb-bfcc-2800f1d5bfb2": { constant: 3.0, category: "DZ", name: "Moonflutter" },
"520361a1-805b-4332-b53e-1da11a94de1b": { constant: 3.0, category: "DZ", name: "イコラト" },
"dd163ba4-a1fa-4fc7-ba45-91561c824cc8": { constant: 3.0, category: "DZ", name: "命日" },
"74bf4e17-c246-4871-9b2b-0dd0d0e6ee28": { constant: 3.0, category: "DZ", name: "Agnostic" },
"d83fd3e1-a609-4b73-b1f1-348ee1dca71d": { constant: 3.0, category: "DZ", name: "夜風" },
"8442e9aa-ea0a-4d9e-8592-cfd9228eb14c": { constant: 3.0, category: "DZ", name: "樱落繁花" },
"1ab3b5cf-b6af-48ec-99e8-2d3a4e9edc72": { constant: 3.0, category: "DZ", name: "Hikari" },
"c6629820-510f-4575-969e-dc6a9d3fe479": { constant: 3.0, category: "DZ", name: "WATER" },
"adcc6c11-2986-4f3c-ae7e-4b52fe75dc83": { constant: 3.0, category: "DZ", name: "Fly To Meteor (Milthm Edit)" },
"75fbb0ef-08fa-47cb-8c6f-acf361f7a081": { constant: 3.0, category: "DZ", name: "Future Unbound (Game Edit)" },
"d8074d7e-dc36-4190-9377-0c62c3775dac": { constant: 3.0, category: "DZ", name: "Dogbite" },
"cfa1c1fd-432e-4313-ae23-fbd6f731ae46": { constant: 3.0, category: "DZ", name: "白虎蓮華" },
"6eac0020-b9a1-480e-9539-633c0e502f9c": { constant: 3.0, category: "DZ", name: "slic.hertz #GdbG"},
"e27a66da-19c5-4d3a-85f4-5defdf5b7b88": { constant: 2.0, category: "CB", name: "Elsorhg" },
"c55ac81b-f00d-4031-8f54-a7735ce84cd3": { constant: 2.0, category: "DZ", name: "Meltovt Necrosys" },
"5b104c2e-94ad-4156-ab25-d1b11be487f3": { constant: 2.0, category: "DZ", name: "Rainbow Flavor!" },
"0af38afb-fe05-403c-90b6-2876bb18616e": { constant: 2.0, category: "DZ", name: "Threat - Sky Islands" },
"6d4c9a21-2ed4-4892-9b38-fd53840de04f": { constant: 2.0, category: "DZ", name: "Moving on" },
"e09a8896-ad87-4cee-8f2a-40b8d4439f26": { constant: 2.0, category: "DZ", name: "Algebra" },
"a5000e56-b917-40ce-9ebb-12cc2c4a2e70": { constant: 2.0, category: "DZ", name: "Fragment of Memories" },
"98913dff-7257-44aa-a0f2-abcd58d11fcd": { constant: 2.0, category: "DZ", name: "Threat - Superstructure" },
"c5032ab4-c03c-42c3-b132-445b94165e8d": { constant: 2.0, category: "DZ", name: "OverRain" },
"b75e195e-7991-4e4a-8afc-7372b4ae95fd": { constant: 2.0, category: "DZ", name: "暮予星光"},
"a4ac4167-5934-4157-90e7-675c994b4451": { constant: 2.0, category: "DZ", name: "参宿四~Betelgeuse~" },
"eceaaf9e-3754-4054-9c17-2d87644de96e": { constant: 2.0, category: "DZ", name: "烁雨" },
"8c794275-de29-4beb-87a1-af024fe94e1e": { constant: 2.0, category: "DZ", name: "花月" },
"3ebe1bbe-5d13-4175-ad91-dcf85c7bfd19": { constant: 2.0, category: "DZ", name: "INFP.mp3" },
"7072a099-a482-484d-84a5-945ac94807e1": { constant: 2.0, category: "DZ", name: "Innocent white" },
"9884d239-3007-4e78-a655-297f000bcf50": { constant: 2.0, category: "DZ", name: "Words" },
"213a40e1-d945-464c-aa6e-9ae82db8fc50": { constant: 2.0, category: "DZ", name: "Jump out" },
"a5ba0b3b-1eb5-4b43-8d12-9e82b6d0afaa": { constant: 2.0, category: "DZ", name: "Bio-Engineering" },
"e7cd8b7f-a19c-488d-b9b6-127524586ed3": { constant: 1.0, category: "DZ", name: "IN" },
"8b329704-9ce5-4361-abd5-b89c68b61286": { constant: 1.0, category: "DZ", name: "Aconsma" },
"68fbf0eb-f43a-4497-afb1-8282176aed97": { constant: 1.0, category: "DZ", name: "HYPER MEMORIES" },
"64cc8f3b-7bed-48a3-80ca-f281c57c0916": { constant: 1.0, category: "DZ", name: "时落之雨" },
"7687d948-dbe1-48c4-a786-fbe669ec7b0c": { constant: 1.0, category: "DZ", name: "粗线条的雨" },
"e69b4e77-ccb2-4694-ba88-7209ed097783": { constant: 1.0, category: "DZ", name: "雨之城" },
"606be389-ad01-41e3-a1ba-e7b355d16948": { constant: 1.0, category: "DZ", name: "Sundown" },
"364be32e-f685-4efb-80b5-64281c93939d": { constant: 1.0, category: "DZ", name: "Welcome to Milthm" },
"4fa17ebf-6a8e-47c1-8d8b-bd1344ccd559": { constant: 1.0, category: "DZ", name: "サイクルの欠片"}
            };
            
/* ========== 全局变量 ========== */
let columns = 4;

/* ========== DOMContentLoaded 事件 ========== */
document.addEventListener('DOMContentLoaded', () => {
  const container = document.querySelector('.container');
  container.style.gridTemplateColumns = `repeat(${columns}, 1fr)`;
});

/* ========== Reality 计算相关 ========== */
function reality(score) {
    if (score >= 1005000) return 1;
    if (score >= 995000) return 1.4 / (Math.exp(-3.65 * (score / 10000 - 99.5)) + 1) - 0.4;
  if (score >= 980000) return ((Math.exp(3.1 * (score - 980000) / 15000) - 1) / (Math.exp(3.1) - 1)) * 0.8 - 0.5;
    if (score >= 700000) return score / 280000 - 4;
    return null;
}

/* ========== 核心流程 ========== */
function processData() {
    const inputData = cleanInputData(document.getElementById('inputData').value);
    const format = isNewFormat(inputData) ? 'new' : 'old';
    const { username, items } = processDataByFormat(inputData, format);

  // 全局保存
  window.processedItems = items;

  // 清空输出区域以避免多次解析时内容堆叠
  document.getElementById('output').innerHTML = '';

  // 根据单曲 Reality 原始值排序
  items.sort((a, b) => b.singleRealityRaw - a.singleRealityRaw);

  // 显示用户信息
    drawUserInfo(username, items);

  // 绘制所有卡片
  items.forEach(drawCard);
  
  // 格式化写回 inputData
    formatInput(username, items);
}

/* ========== 工具函数 ========== */
function cleanInputData(data) {
    return data.replace(/\n/g, '').replace(/  /g, '');
}

function isNewFormat(data) {
    return /^\[.*\],\{.*\}$/.test(data);
}

function processDataByFormat(data, format) {
  const cleaned = cleanInputData(data);
  return format === 'new' ? processNewFormat(cleaned) : processOldFormat(cleaned);
}

function processNewFormat(data) {
  const [, username, songDataStr] = data.match(/^\[(.*?)\],\{(.*)\}$/);
  const songData = songDataStr.split('],[');

  const items = songData.map(processSong);
  return { username, items };
}

function processOldFormat(data) {
  const start = data.indexOf('{"UserName":');
  const end = data.indexOf('}]}') + 3;
  const str = data.slice(start, end);
  
  const parsed = tryParseJSON(str);
  if (!(parsed && parsed.SongRecords)) {
        alert("存档数据无效或无法解析。");
        return { username: "", items: [] };
    }

  const items = parsed.SongRecords
    .map(processSongFromOldFormat)
    .filter(Boolean);
  
  return { username: parsed.UserName, items };
}

function processSong(song) {
    const [title, category, constant, score, accuracy, level] = song.replace(/[\[\]]/g, '').split(',');
  const constantVal = parseFloat(constant);
  const scoreVal = parseInt(score, 10);
  const accuracyVal = parseFloat(accuracy);
  const levelVal = parseInt(level, 10);
  
  const rlt = reality(scoreVal);
  const singleRealityRaw = rlt ? rlt + constantVal : 0;
  
    return {
    singleRealityRaw,
    singleReality: singleRealityRaw.toFixed(2),
    constant: constantVal, // 移除 toFixed(1)
        name: title,
        category,
    bestScore: scoreVal,
    bestAccuracy: accuracyVal.toFixed(4),
    bestLevel: levelVal
    };
}

function processSongFromOldFormat(record) {
    const { BeatmapID, BestScore, BestAccuracy, BestLevel } = record;
  const constantObj = constants[BeatmapID];
  
  if (!constantObj) return null;
  
  const { constant, category, name } = constantObj;
    const rlt = reality(BestScore);
  const singleRealityRaw = rlt ? rlt + constant : 0;
  
    return {
    singleRealityRaw,
    singleReality: singleRealityRaw.toFixed(2),
    constant: constant, // 移除 toFixed(1)
    name,
    category,
    bestScore: BestScore,
    bestAccuracy: BestAccuracy.toFixed(4),
    bestLevel: BestLevel
    };
}

function formatInput(username, items) {
  const formattedItems = items.map(item => 
    `[${item.name},${item.category},${item.constant},${item.bestScore},${item.bestAccuracy},${item.bestLevel}]`
  ).join(',\n  ');
  
  document.getElementById('inputData').value = `[${username}],{\n  ${formattedItems}\n}`;
}

function calculateAverageReality(results) {
  const filtered = results.filter(item => item.singleRealityRaw > 0);
  const top = filtered.slice(0, 20);
  const sum = top.reduce((acc, item) => acc + item.singleRealityRaw, 0);
  
  // 始终除以20，即使top.length < 20
  return top.length > 0 ? (sum / 20).toFixed(4) : '0.0000';
}

/* ========== 显示用户信息 ========== */
function drawUserInfo(username, results) {
  const userInfoDiv = document.getElementById('userInfo');
  const usercontainer = document.getElementById('usercontainer');
  usercontainer.style.display = 'block';
  
  const avg = calculateAverageReality(results);
  userInfoDiv.innerHTML = `${username} ${avg}`;
  
  // 保存到全局
  window.username = username;
  window.average = avg;
}

/* ========== 绘制单张卡片 ========== */
function drawCard(result, index) {
    const outputDiv = document.getElementById('output');
    const card = document.createElement('div');
    card.classList.add('card');

  // 背景
    card.style.background = result.bestLevel === 0
        ? 'linear-gradient(135deg, #8400C3,#3030B0,#2e61ef)'
        : 'linear-gradient(45deg, #4028d7, #8839fe)';
    card.style.color = '#DDA0DD';

  // 计算基础字号
    const baseFontSize = (window.innerWidth * window.innerHeight) / 60000;
    let fontSize = (baseFontSize * 4) / columns;
  const marginBottom = (baseFontSize * 4) / columns;

  // 标题
    const title = document.createElement('div');
    title.classList.add('title');
    title.innerText = result.name;
    card.appendChild(title);

    const maxCardWidth = card.offsetWidth * 0.7;
    title.style.fontSize = `${fontSize * 1.3}px`;
    title.style.whiteSpace = 'nowrap';
    title.style.overflow = 'hidden';
    title.style.textOverflow = 'ellipsis';

  // 若标题过长就减小字号
    while (title.offsetWidth > maxCardWidth && fontSize > 2) {
    fontSize--;
        title.style.fontSize = `${fontSize}px`;
    }

  // Info 行
    const info = document.createElement('div');
    info.classList.add('info');
  Object.assign(info.style, {
    display: 'flex',
    justifyContent: 'space-between',
    alignItems: 'center',
    whiteSpace: 'nowrap',
    overflow: 'visible',
    textOverflow: 'ellipsis',
    fontSize: `${fontSize}px`,
    marginBottom: `${marginBottom}px`
  });

  const constantText = `${parseFloat(result.constant).toFixed(1)}->&nbsp`;
    const singleRealitySpan = document.createElement('span');
    singleRealitySpan.innerHTML = parseFloat(result.singleReality).toFixed(2);

  // 根据分数变色
    if (result.bestScore >= 1005000) {
        singleRealitySpan.style.color = '#1cd3b4';
    } else if (result.singleReality == 0) {
        singleRealitySpan.style.color = '#a5a5a5';
    } else if (result.singleReality < 0) {
        singleRealitySpan.style.color = '#ff4040';
    }

    info.innerHTML = `${result.category} ${constantText}`;
    info.appendChild(singleRealitySpan);

  // 准度
    const accuracySpan = document.createElement('span');
    accuracySpan.classList.add('accuracy');
    accuracySpan.innerHTML = `&nbsp&nbsp${(result.bestAccuracy * 100).toFixed(2)}%`;
  Object.assign(accuracySpan.style, {
    marginLeft: 'auto',
    whiteSpace: 'nowrap',
    overflow: 'visible'
  });
    info.appendChild(accuracySpan);

    card.appendChild(info);

  // 分数
    const score = document.createElement('div');
    score.classList.add('score');
    score.innerText = result.bestScore;
    score.style.fontSize = `${fontSize * 2.5}px`;
    score.style.marginBottom = `${marginBottom}px`;
    score.style.whiteSpace = 'nowrap';
    score.style.overflow = 'hidden';

  // 根据等级分数渐变
if (result.bestLevel < 2) {
    Object.assign(score.style, {
      background: 'linear-gradient(to right, #12a9fb, #ee80ff)',
      color: 'transparent',
      backgroundClip: 'text',
      WebkitBackgroundClip: 'text'
    });
} else if (result.bestLevel === 2) {
    Object.assign(score.style, {
      background: 'linear-gradient(to right, #5e94f3, #80b2ff)',
      color: 'transparent',
      backgroundClip: 'text',
      WebkitBackgroundClip: 'text'
    });
} else {
    score.style.color = '#D1D1D1';
}

    card.appendChild(score);

  // 序号
    const indexElem = document.createElement('div');
    indexElem.classList.add('index');
    indexElem.innerText = `#${index + 1}`;
  Object.assign(indexElem.style, {
    fontSize: `${fontSize}px`,
    marginBottom: `${marginBottom}px`,
    whiteSpace: 'nowrap',
    overflow: 'hidden',
    textOverflow: 'ellipsis'
  });
    card.appendChild(indexElem);

  // 加入到输出
    outputDiv.appendChild(card);
}

/* ========== 列数调整 ========== */
function changeColumns(delta) {
    columns = Math.max(1, columns + delta);
    document.querySelector('.container').style.gridTemplateColumns = `repeat(${columns}, 1fr)`;
    document.getElementById('output').innerHTML = ''; 
    processData();
}

/* ========== 文件处理等原有逻辑 ========== */
function upl() {
  document.getElementById('fileupLoad').click();
}

// 监听文件上传
document.getElementById('fileupLoad').addEventListener("change", async function (e) {
  const file = e.target.files[0];
  if (!file) return;

  if (file.name.toLowerCase().endsWith('.db')) {
      const reader = new FileReader();
      reader.onload = async () => {
          const SQL = await initSQL();  // 加载 SQL.js
          processDBFile(reader.result, SQL);
      };
      reader.readAsArrayBuffer(file);
  } else {
      const reader = new FileReader();
      reader.onload = () => handleFile(reader.result, file.name.toLowerCase());
      reader.onerror = () => alert("读取文件失败");
      reader.readAsText(file);
  }
});

// **初始化 SQL.js**
async function initSQL() {
  const SQL = await initSqlJs({
      locateFile: filename => `./js/${filename}`  // 自动找到 sql-wasm.wasm
  });
  return SQL;
}

// **处理 SQLite 数据库文件**
async function processDBFile(arrayBuffer, SQL) {
  try {
      const db = new SQL.Database(new Uint8Array(arrayBuffer));

      // 查询 `kv` 表中的 `PlayerFile`
      const results = db.exec("SELECT value FROM kv WHERE key='PlayerFile'");
      if (results.length === 0 || results[0].values.length === 0) {
          alert("未找到 PlayerFile 存档");
          return;
      }

      // 提取 JSON 并解析
      const playerFileJSON = results[0].values[0][0]; 
      const extracted = extractJSON(playerFileJSON);

      if (extracted) {
          document.getElementById('inputData').value = extracted;
          processData();
      } else {
          alert("数据库存档解析失败！");
      }
  } catch (error) {
      alert(`解析数据库失败: ${error.message}`);
  }
}

function handleFile(content, fileName) {
  const inputDataElem = document.getElementById('inputData');
  
    if (fileName.endsWith('.json')) {
    const extracted = extractJSON(content);
    if (extracted) {
      inputDataElem.value = extracted;
            processData();
        } else {
            alert("提取 JSON 数据失败！");
        }
    } else if (fileName.endsWith('.xml')) {
        processXMLFile(content);
    } else if (fileName === 'prefs') {
        processPrefsFile(content);
    } else if (fileName.endsWith('.plist')) {
        processPlistFile(content);
    } else if (fileName.endsWith('.reg')) {
        processRegFile(content);
    } else if (fileName.endsWith('.txt')) {
    inputDataElem.value = content;
    processData();
    } else {
        alert("不支持的文件类型！");
    }
}

function processRegFile(regContent) {
    const match = regContent.match(/"PlayerFile_h\d+"\s*=\s*hex:((?:[0-9a-fA-F]{2},?[\\\n\s]*)+)/);
    if (match) {
        const decoded = hexToString(match[1].replace(/[,\\\s\n]/g, ''));
        document.getElementById('inputData').value = decoded;
        processData();
    } else {
        alert('未找到 PlayerFile 键或值格式不正确');
    }
}

function hexToString(hexData) {
  const arr = hexData.match(/.{2}/g) || [];
  const res = arr.map(byte => String.fromCharCode(parseInt(byte, 16)));
  return res.join('');
}

function processPlistFile(binaryString) {
    try {
    const parsed = plist.parse(binaryString);
    const playerFile = parsed.PlayerFile;
        if (playerFile) {
            document.getElementById('inputData').value = atob(playerFile);
            processData();
        } else {
            alert('未找到 PlayerFile 标签');
        }
    } catch (e) {
        alert("plist 文件格式错误！");
    }
}

function processXMLFile(xmlContent) {
  const doc = new DOMParser().parseFromString(xmlContent, "application/xml");
  const pf = doc.querySelector('string[name="PlayerFile"]');
  if (pf && pf.textContent) {
    document.getElementById('inputData').value = decodeURIComponent(pf.textContent);
        processData();
    } else {
        alert('未找到 <string name="PlayerFile"> 标签');
    }
}

function processPrefsFile(prefsContent) {
  const doc = new DOMParser().parseFromString(prefsContent, "application/xml");
  const pf = doc.querySelector('pref[name="PlayerFile"][type="string"]');
  if (pf && pf.textContent) {
    document.getElementById('inputData').value = atob(pf.textContent);
        processData();
    } else {
        alert('未找到 <pref name="PlayerFile" type="string"> 标签');
    }
}

function extractJSON(jsonString) {
    const start = jsonString.indexOf('{"UserName":');
    const end = jsonString.indexOf(']}]', start);
  return (start !== -1 && end !== -1) ? `${jsonString.slice(start, end + 3)}}` : null;
}

function tryParseJSON(str) {
  try {
    return JSON.parse(str);
  } catch (e) {
    return null;
  }
}

/* ========== QQ 上传逻辑 & 其他 UI  ========== */
const qqEntry = document.getElementById("qqEntry");
const qqBotResultDialog = new mdui.Dialog("#qqBotResultDialog", { modal: true, closeOnEsc: false });
const inputData1 = document.getElementById("inputData");
const qqBotResultCloseBtn = document.getElementById("qqBotResultCloseBtn");
const qqBotResultText = document.getElementById("qqBotResultText");
const uploadButton = document.getElementById("uploadButton");

function upload() {
  qqBotResultCloseBtn.disabled = true;
  const userdata = qqEntry.value.trim();
  
  if (userdata === "") {
    mdui.alert("请输入QQ号!");
    return;
  }
  
    qqBotResultDialog.open();
    qqBotResultText.innerHTML = "正在获取数据...";
    document.getElementById("qqBotResultContent").value = '';

  const data2 = inputData1.value;
  const data_param = { nqid: userdata, data: data2, type: "milthm" };

  const xhr = new XMLHttpRequest();
    xhr.open("POST", "http://175.27.145.108:7155", true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        const response = xhr.responseText;
          qqBotResultText.innerHTML = "执行完成。";
          document.getElementById("qqBotResultContent").value = response;
          qqBotResultCloseBtn.disabled = false;
          console.log(response);
      } else {
        qqBotResultText.innerHTML = "获取数据失败。";
        qqBotResultCloseBtn.disabled = false;
        }
      }
    };
    xhr.send(JSON.stringify(data_param));

  // 发送第二个请求
    try {
    const xhr2 = new XMLHttpRequest();
      xhr2.open("POST", "submit.php", true);
      xhr2.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr2.onreadystatechange = function() {
      if (xhr2.readyState === XMLHttpRequest.DONE && xhr2.status === 200) {
        console.log(xhr2.responseText);
        }
      };
    xhr2.send(JSON.stringify({ qq: userdata, data: data2 }));
    } catch (error) {
      console.error('Error request: ', error);
  }
}

function openContributionDialog() {
  new mdui.Dialog('#contributionDialog').open();
}

/* ========== 下载图片 (含背景、卡片等) ========== */
/* ========== 下载图片 (含背景、卡片等) ========== */
function downloadImage() {
  const canvas = document.createElement('canvas');
  canvas.width = 1200;
  canvas.height = 2200;
  const ctx = canvas.getContext('2d');

  loadImage('./jpgs/查分图.jpg')
    .catch(() => null)
    .then(bgImage => {
      if (bgImage) {
        ctx.drawImage(bgImage, 0, 0, canvas.width, canvas.height);
        } else {
        ctx.fillStyle = '#000000';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        }

      // 半透明矩形
      ctx.fillStyle = 'rgba(128, 128, 128, 0.3)';
      ctx.fillRect(0, 50, canvas.width, 200);

      // 线条
        ctx.beginPath();
      ctx.strokeStyle = 'rgba(255,255,255,0.8)';
      ctx.lineWidth = 3;
      ctx.moveTo(550, 250);
      ctx.lineTo(650, 50);
      ctx.stroke();

      // 文字信息
      ctx.font = '25px Arial';
      ctx.fillStyle = '#ffffff';
      ctx.fillText(`Player: ${window.username}`, 660, 100);
      ctx.fillText(`Reality: ${window.average}`, 660, 150);
      const now = new Date();
      const dateStr = `${now.toISOString().split('T')[0]} ${now.toTimeString().split(' ')[0]}`;
      ctx.fillText(`Date: ${dateStr}`, 660, 200);

      ctx.font = '50px Arial';
      ctx.fillText('Reality查分器v3.0', 100, 130);
      ctx.font = '30px Arial';
      ctx.fillText('http://k9.lv/c/', 100, 180);

      // 预加载并绘制卡片
      preloadImages(ctx, canvas);
    });

  function preloadImages(ctx, canvas) {
    const items = window.processedItems || [];
    const maxItems = Math.min(22, items.length);
    const imagePromises = [];

    for (let i = 0; i < maxItems; i++) {
      const encodedName = encodeURIComponent(items[i].name); // 对歌曲名称进行编码
      const imgPath = `./jpgs/${encodedName}.jpg`;
      const promise = loadImage(imgPath).catch(() => loadImage('./jpgs/NYA.jpg'));
      imagePromises.push(promise);
    }

    Promise.all(imagePromises).then(images => drawCards(ctx, canvas, items, images));
  }

  function drawCards(ctx, canvas, items, images) {
    const scale = 1.3;
    const cardWidth = 340 * scale;
    const cardHeight = 100 * scale;
    const imgWidth = 142 * scale;
    const imgHeight = 80 * scale;

    const xOffset = 110;
    const yOffset = 350;
    const columnSpacing = 400 * scale;
    const rowSpacing = 125 * scale;

    items.slice(0, 22).forEach((item, i) => {
      const x = xOffset + (i % 2) * columnSpacing;
      const y = yOffset + Math.floor(i / 2) * rowSpacing - ((i % 2 === 0) ? 50 : 0);

      // 卡片背景
      ctx.fillStyle = 'rgba(128, 128, 128, 0.4)';
      ctx.fillRect(x, y, cardWidth, cardHeight);

      // 编号
      ctx.font = `${13 * scale}px Arial`;
      ctx.textAlign = 'right';
      ctx.textBaseline = 'top';
      ctx.fillStyle = (i < 20) ? '#FAFAFA' : '#C9C9C9';
      ctx.fillText(`#${i + 1}`, x + cardWidth - 10, y + 5 * scale);

      // 分数：不足7位前补0
      let strScore = item.bestScore.toString();
      while (strScore.length < 7) strScore = '0' + strScore;

      // 分数颜色
      let scoreColor;
      if (item.bestLevel < 2) {
        const gradient = ctx.createLinearGradient(x, y + 40 * scale, x, y + 70 * scale);
        gradient.addColorStop(0, '#99C5FB');
        gradient.addColorStop(1, '#D8C3FA');
        scoreColor = gradient;
      } else if (item.bestLevel === 2) {
        scoreColor = '#90CAEF';
        } else {
        scoreColor = '#FFFFFF';
      }

      ctx.font = `${30 * scale}px Arial`;
      ctx.textAlign = 'left';
      ctx.fillStyle = scoreColor;
      ctx.fillText(strScore, x + 160 * scale, y + 40 * scale);

      // 曲名，动态调整字体大小
      const maxTextWidth = 200;
      let currentFontSize = 19 * scale;
      ctx.font = `${currentFontSize}px Arial`;
      let textWidth = ctx.measureText(item.name).width;
      while (textWidth > maxTextWidth && currentFontSize > 10) {
        currentFontSize--;
        ctx.font = `${currentFontSize}px Arial`;
        textWidth = ctx.measureText(item.name).width;
      }
      ctx.fillStyle = '#FFFFFF';
      ctx.fillText(item.name, x + 163 * scale, y + 18 * scale);

      // Reality + Accuracy
      ctx.font = `${15 * scale}px Arial`;
      ctx.fillStyle = '#FFFFFF';
      const accText = `${(item.bestAccuracy * 100).toFixed(2)}%`;
      ctx.fillText(`${item.category} ${parseFloat(item.constant).toFixed(1)} > ${item.singleReality}   ${accText}`, x + 160 * scale, y + 75 * scale);

      // 曲绘图
      ctx.drawImage(images[i], x + 10 * scale, y + 10 * scale, imgWidth, imgHeight);
    });

    exportImage(canvas);
  }

  function exportImage(canvas) {
    const link = document.createElement('a');
    link.href = canvas.toDataURL('image/png');
    const now = new Date();
    const timestamp = now.toISOString().replace(/[:\-T]/g, '_').split('.')[0];
    link.download = `output_${timestamp}.png`;
    link.click();
}

  function loadImage(src) {
    return new Promise((resolve, reject) => {
      const img = new Image();
      img.onload = () => resolve(img);
      img.onerror = reject;
      img.src = src;
    });
  }
}

