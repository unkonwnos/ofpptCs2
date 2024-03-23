const a=document.querySelector("#container_imgs"),n=document.querySelector("#btnAddImg");let o=1;n.addEventListener("click",()=>{const e=document.createElement("div");e.classList.add("rounded-md","border","border-black","relative","bg-gray-50","p-4","shadow-md","w-36"),e.innerHTML=`
                        <label for="upload${o}" class="flex flex-col items-center gap-2 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-white stroke-black" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <input id='upload${o}' type="file" name='images[]' class="hidden upload" />
                                <span class="text-gray-600 font-medium">Upload file</span>
                        </label>
                        <i class="fa-solid  fa-delete-left text-red-500 absolute removeFile cursor-pointer rounded-2xl m-1 px-1 right-0 top-0 hover:text-black hover:scale-110"></i>
                    `,a.appendChild(e),r(),o++});function r(){document.querySelectorAll(".upload").forEach(t=>{t.addEventListener("change",l=>{t.nextElementSibling.textContent=l.target.value.split("\\").pop()})}),document.querySelectorAll(".removeFile").forEach(t=>{t.addEventListener("click",l=>{l.target.parentElement.remove()})})}r();
