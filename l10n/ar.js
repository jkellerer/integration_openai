OC.L10N.register(
    "integration_openai",
    {
    "Unknown error while clearing prompt history" : "حدث خطأ غير محدد أثناء محو السجل التاريخي للمَحَثّ",
    "ChatGPT-like text generation (by OpenAI)" : "إنشاء نص شبيه بـ ChatGPT (من  OpenAI)",
    "ChatGPT-like text generation (with LocalAI)" : "إنشاء نص شبيه بـ GhatGPT (باستعمال OpenAI)",
    "AI image generation (by OpenAI Dall-E 2)" : "توليد الصور بالذكاء الاصطناعي (من OpenAI Dall-E 2)",
    "AI image generation (with LocalAI)" : "توليد صور بالذكاء الاصطناعي ( باستعمال OpenAI)",
    "AI speech-to-text (Whisper via OpenAI)" : "تحويل الكلام إلى نص بالذكاء الاصطناعي (Whisper عبر OpenAI)",
    "AI speech-to-text (Whisper via LocalAI)" : "تحويل كلام إلى نص بالذكاء الاصطناعي (باستعمال OpenAI)",
    "Unknown models error" : "خطأ نماذج غير محدد",
    "Unknown error while retrieving prompt history." : "حدث خطأ غير محدد أثناء استرجاع السجل التاريخي للمَحَثّ.",
    "Unknown error while clearing prompt history." : "حدث خطأ غير محدد أثناء محو السجل التاريخي للمَحَثّ.",
    "Text generation" : "توليد النص",
    "Image generation" : "توليد الصورة",
    "Audio transcription" : "الترقين الصوتي Audio transcription",
    "Unknown" : "غير معروف",
    "tokens" : "أَمَارَات tokens",
    "images" : "صِوَر",
    "seconds" : "ثوانٍ",
    "Unknown error while retrieving quota usage." : "حدث خطأ غير محدد أثناء استرجاع باقي الحصة ",
    "Text generation quota exceeded" : " حصة توليد النصوص تمّ تجاوزها",
    "Unknown text generation error" : "حدث خطأ غير محدد عند توليد النصوص",
    "Could not read audio file." : "تعذّرت قراءة الملف الصوتي.",
    "Audio transcription quota exceeded" : "حصة الترقين الصوتي تمّ تجاوزها",
    "Unknown audio trancription error" : "حدث خطأ غير محدد عند الترقين الصوتي",
    "Image generation quota exceeded" : "حصة توليد الصور تمّ تجاوزها",
    "Unknown image generation error" : "خطأ غير محدد عند توليد الصور",
    "Image generation not found" : "توليد الصِّوَر غير موجود",
    "Unknown image generation request error" : "حدث خطأ غير محدد عند طلب توليد الصور",
    "Image not found" : "الصورة غير موجودة",
    "Unknown image request error" : "حدث خطأ عند طلب توليد الصور",
    "Bad HTTP method" : "دالة HTTP  غير صحيحة",
    "Bad credentials" : "معلومات تسجيل الدخول غير صحيحة",
    "API request error: " : "خطأ طلب API: ",
    "Unknown API request error." : "خطأ غير محدد عند طلب API",
    "Connected accounts" : "حسابات مترابطة",
    "OpenAI's Whisper Speech-To-Text" : "تطبيق \"ويسبر\" الهامس Whisper لتحويل الكلام إلي نص من OpenAI",
    "LocalAI's Whisper Speech-To-Text" : "تحويل الكلام إلى نص بالذكاء االاصطناعي محليّاً باستعمال تطبيق \"الهامس\" Whisper",
    "OpenAI integration" : "تكامل OpenAI",
    "LocalAI integration" : "مُكاملة الذكاء الاصطناعي محليّاً LocalAI",
    "Reformulate" : "أعِد الصياغة",
    "Formulate text in a different way." : "صياغة النص بطريقة مختلفة",
    "OpenAI and LocalAI integration" : "مُكاملة OpenAI و LocalAI",
    "Integration of OpenAI and LocalAI services" : "مُكامَلة خِدْمَات OpenAI و LocalAI",
    "This app includes 3 custom smart pickers for Nextcloud:\n* ChatGPT-like answers\n* Image generation (with DALL·E 2 or LocalAI)\n* Whisper dictation\n\nIt also implements\n\n* A Translation provider (using any available language model)\n* A SpeechToText provider (using Whisper)\n\nInstead of connecting to the OpenAI API for these, you can also connect to a self-hosted [LocalAI](https://localai.io) instance.\n\n## Ethical AI Rating\n### Rating for Text generation using ChatGPT via OpenAI API: 🔴\n\nNegative:\n* the software for training and inference of this model is proprietary, limiting running it locally or training by yourself\n* the trained model is not freely available, so the model can not be run on-premises\n* the training data is not freely available, limiting the ability of external parties to check and correct for bias or optimise the model's performance and CO2 usage.\n\n\n### Rating for Translation using ChatGPT via OpenAI API: 🔴\n\nNegative:\n* the software for training and inference of this model is proprietary, limiting running it locally or training by yourself\n* the trained model is not freely available, so the model can not be run on-premises\n* the training data is not freely available, limiting the ability of external parties to check and correct for bias or optimise the model's performance and CO2 usage.\n\n### Rating for Image generation using DALL·E via OpenAI API: 🔴\n\nNegative:\n* the software for training and inferencing of this model is proprietary, limiting running it locally or training by yourself\n* the trained model is not freely available, so the model can not be ran on-premises\n* the training data is not freely available, limiting the ability of external parties to check and correct for bias or optimise the model’s performance and CO2 usage.\n\n\n### Rating for Speech-To-Text using Whisper via OpenAI API: 🟡\n\nPositive:\n* the software for training and inferencing of this model is open source\n* The trained model is freely available, and thus can run on-premise\n\nNegative:\n* the training data is not freely available, limiting the ability of external parties to check and correct for bias or optimise the model’s performance and CO2 usage.\n\n### Rating for Text generation via LocalAI: 🟢\n\nPositive:\n* the software for training and inferencing of this model is open source\n* the trained model is freely available, and thus can be ran on-premises\n* the training data is freely available, making it possible to check or correct for bias or optimise the performance and CO2 usage.\n\n\n### Rating for Image generation using Stable Diffusion via LocalAI : 🟡\n\nPositive:\n* the software for training and inferencing of this model is open source\n* the trained model is freely available, and thus can be ran on-premises\n\nNegative:\n* the training data is not freely available, limiting the ability of external parties to check and correct for bias or optimise the model’s performance and CO2 usage.\n\n\n### Rating for Speech-To-Text using Whisper via LocalAI: 🟡\n\nPositive:\n* the software for training and inferencing of this model is open source\n* the trained model is freely available, and thus can be ran on-premises \n\nNegative:\n* the training data is not freely available, limiting the ability of external parties to check and correct for bias or optimise the model’s performance and CO2 usage.\n\nLearn more about the Nextcloud Ethical AI Rating [in our blog](https://nextcloud.com/blog/nextcloud-ethical-ai-rating/)." : "يتضمن هذا التطبيق 3 لواقط ذكية مخصصة لنكست كلاود: \n* إجابات شبيهة بـ ChatGPT \n* توليد الصور (باستخدام DALL · E 2 أو LocalAI) \n* الهامس لتحوي الكلام إلى نص\n\nكما أنها تنفذ \n* مزود ترجمة (باستخدام أي نموذج لغة متاح) \n* مزود تحويل الكلام إلى نص كتابي SpeechToText (باستخدام  \"الهامس\" Whisper) \n\nبدلاً من الاتصال بـ OpenAI API لهذه الأشياء، يمكنك أيضًا الاتصال بخادوم [LocalAI]  مستضاف محليّاً (https://localai.io). \n\n## تصنيف أخلاقيات الذكاء الاصطناعي\n\n### تقييم إنشاء النص باستخدام ChatGPT عبر OpenAI API: 🔴 \nالسلبيّات: \n* برنامج التدريب والاستدلال الخاص بهذا النموذج هو برنامج خاص، مما يحدُّ من تشغيله محلياً أو التدريب عليه بنفسك \n* النموذج المُدَّرب غير متاح مجاناً، لذلك لا يمكن تشغيل النموذج محلياً \n* بيانات التدريب غير متاحة مجاناً، مما يحدُّ من قدرة الأطراف الخارجية على التحقق من التحيز وتصحيحه أو تحسين أداء النموذج و استهلاك ثاني أكسيد الكربون co2. \n\n### تقييم الترجمة باستخدام ChatGPT عبر OpenAI API: 🔴 \nالسلبيّات: \n* برنامج التدريب والاستدلال الخاص بهذا النموذج هو برنامج خاص، مما يحدُّ من تشغيله محلياً أو التدريب عليه بنفسك \n* النموذج المُدَّرب غير متاح مجاناً، لذلك لا يمكن تشغيل النموذج محلياً \n* بيانات التدريب غير متاحة مجاناً، مما يحدُّ من قدرة الأطراف الخارجية على التحقق من التحيز وتصحيحه أو تحسين أداء النموذج و استهلاك ثاني أكسيد الكربون co2. \n\n### تقييم تحويل الكلام إلى نص باستخدام الهامس Whisper عبر OpenAI API: 🟡 \nالإيجابيّات: \n* برنامج التدريب والاستدلال على هذا النموذج مفتوح المصدر \n* النموذج المُدرب متاح مجانًا، و بالتالي يمكن تشغيله داخل المؤسسة \\\nالسلبيّات: \n* بيانات التدريب غير متاحة مجانًا، مما يحد من قدرة الأطراف الخارجية على التحقق من التحيز وتصحيحه أو تحسين أداء النموذج و استهلاك ثاني أكسيد الكربون CO2. \n\n### تقييم إنشاء النص عبر LocalAI: 🟢 \nالإيجابيّات: \n* برنامج التدريب والاستدلال على هذا النموذج مفتوح المصدر \n* النموذج المدرب متاح مجانًا، و بالتالي يمكن تشغيله محليًا \n* بيانات التدريب متاحة مجانًا، مما يجعل من الممكن التحقق من التحيز أو تصحيحه أو تحسين الأداء و استهلاك ثاني أكسيد الكربون CO2. \n\n### تقييم إنشاء الصور باستخدام \"الانتشار المستقر\" Stable Diffusion عبر LocalAI: 🟡 \nالإيجابيّات: \n* برنامج التدريب والاستدلال على هذا النموذج مفتوح المصدر \n* النموذج المُدرب متاح مجانًا، و بالتالي يمكن تشغيله داخل المؤسسة \\\nالسلبيّات: \n* بيانات التدريب غير متاحة مجانًا، مما يحد من قدرة الأطراف الخارجية على التحقق من التحيز وتصحيحه أو تحسين أداء النموذج و استهلاك ثاني أكسيد الكربون CO2. \n\n### تقييم تحويل الكلام إلى نص باستخدام \"الهامس\" Whisper عبر LocalAI: 🟡 \nالإيجابيّات: \n* برنامج التدريب والاستدلال على هذا النموذج مفتوح المصدر \n* النموذج المُدرب متاح مجانًا، و بالتالي يمكن تشغيله داخل المؤسسة \\\nالسلبيّات: \n* بيانات التدريب غير متاحة مجانًا، مما يحد من قدرة الأطراف الخارجية على التحقق من التحيز وتصحيحه أو تحسين أداء النموذج و استهلاك ثاني أكسيد الكربون CO2. \n\nتعرف على المزيد حول تصنيف نكست كلاود لأخلاقيات الذكاء الاصطناعي [في مدونتنا](https://nextcloud.com/blog/nextcloud-ethical-ai-rating/).",
    "LocalAI URL (leave empty to use openai.com)" : "عنوان URL لقاعدة بيانات LocalAI (اتركه فارغًا لاستخدام openai.com)",
    "example:" : "مثال:",
    "This should be the address of your LocalAI instance from the point of view of your Nextcloud server. This can be a local address with a port like http://localhost:8080" : "يجب أن يكون هذا هو عنوان مثييل لوكال أيه آي الخاص بك من وجهة نظر خادم نكست كلود الخاص بك. ويمكن أن يكون هذا عنوانًا محليًا بمنفذ مثل http://localhost:8080",
    "Choose endpoint: " : "إختَر النقطة الحدِّيّة endpoint ـ : ",
    "Chat completions" : "إستكمالات الدردشة",
    "Completions" : "إستكمالات",
    "Using the chat endpoint may improve text generation quality for \"instruction following\" fine-tuned models." : "إستعمال النقطة الحدِّيّة للدردشة chat endpoint يُمكن أن يُحسِّن من كفاءة توليد النصوص للنماذج المُناغَمَة file-tuned models المُتَّبِعَة للأوامر \"instruction following\".",
    "API key (optional with LocalAI)" : "مفتاح API ـ (إختياري مع LocalAI)",
    "your API key" : "مفتاحك لواجهة برمجة التطبيقات ",
    "You can create an API key in your OpenAI account settings:" : "يُمكنك إنشاء مفتاح لـ API في إعدادات حسابك على OpenAI:",
    "Default completion model to use" : "نموذج الإكمال الافتراضي لاستخدامه",
    "More information about OpenAI models" : "مزيد من المعلومات حول نماذج OpenAI",
    "More information about LocalAI models" : "معلومات أكثر حول نماذج LocalAI",
    "Request timeout (seconds)" : "مُهلة تنفيذ الطلب (بالثواني)",
    "Usage limits" : "حدود الاستعمال",
    "Quota enforcement time period (days)" : "الفترة الزمنية لإنفاذ الحصص (بالأيام)",
    "Usage quotas per time period" : "حصص الاستخدام لكل فترة زمنية",
    "Quota type" : "نوع الحصة",
    "Per-user quota / period" : "الحصة / الفترة لكل مستخدم",
    "Current system-wide usage / period" : "الحصة/ الفترة على مستوى النظام حاليّاً",
    "A per-user limit for usage of this API type (0 for unlimited)" : "تقييد لحصة كل مستخدِم عند استعمال هذا الـ API ـ ( 0 تعني .حصة غير محددة) ",
    "Max new tokens per request" : "أقصى عدد من الأَمَارَات tokens الجديدة لكل طلب",
    "Maximum number of new tokens generated for a single text generation prompt" : "أقصى عدد من الأَمَارَات tokens الجديدة المولدة لكل طلب مفرد لتوليد نص",
    "Select enabled features" : "إختَر الخصائص المُمَكّنة",
    "Whisper transcription/translation with the Smart Picker" : "استتكتاب ويسبر/ ترجمة باستخدام أداة الانتقاء الذكية",
    "Image generation with the Smart Picker" : "إنشاء الصور باستخدام أداة الانتقاء الذكية",
    "Text generation with the Smart Picker" : "إنشاء نص باستخدام أداة الانتقاء الذكية",
    "Translation provider (to translate Talk messages for example)" : "مزود الترجمة (لترجمة رسائل تطبيق Talk على سبيل المثال)",
    "Speech-to-text provider (to transcribe Talk recordings for example)" : "مزود تحويل الكلام إلى نص Speech-to-text (لاستكتاب تسجيلات تطبيق Talk على سبيل المثال)",
    "Failed to load quota info" : "تعذّر تحميل معلومات الحصص",
    "OpenAI admin options saved" : "تمّ حفظ خيارات مُشرِف OpenAI",
    "Failed to save OpenAI admin options" : "فشل في حفظ خيارات مُشرِف OpenAI",
    "Open image in a new tab" : "فتح الصورة في علامة تبويب جديدة",
    "Image information was not found on the server. The data might have been cleaned up because the image has not been displayed for a long time." : "لم يتم العثور على معلومات الصورة على الخادوم. ربما تمّ محو البيانات بسبب عدم عرض الصورة منذ فترة طويلة.",
    "Loading image" : "تحميل صورة",
    "Generated image" : "صورة مُولّدة",
    "The remote image cannot be fetched. It may have been deleted due to not being viewed for a long time." : "لا يمكن جلب الصورة القَصِيّة. ربما تم حذفها بسبب عدم عرضها منذ فترة طويلة.",
    "Direct image link" : "رابط صورة مباشر",
    "Your administrator defined a custom service address" : "حدد المسؤول الخاص بك عنوان خدمة مخصص",
    "Leave the API key empty to use the one defined by administrators" : "أترُك مفتاح واجهة برمجة التطبيقات فارغًا ليتم استخدام المفتاح الذي حدده المشرف",
    "API key" : "مفتاح واجهة برمجة التطبيقات API key",
    "You can create a free API key in your OpenAI account settings:" : "يمكنك إنشاء مفتاح واجهة برمجة التطبيقات مجاني في إعدادات حسابك على OpenAI: ",
    "Clear prompt history" : "محو السجل التاريخي للمَحَثّ",
    "Clear text prompts" : "محو مَحَثّات النصوص",
    "Clear image prompts" : "محو مَحَثّات الصور",
    "Usage quota info" : "معلومات حصص الاستعمال",
    "Usage" : "الاستعمال",
    "Specifying your own API key will allow unlimited usage" : "سيسمح تحديد مفتاح API الخاص بك باستعمال غير محدد الحصة",
    "OpenAI options saved" : "تمّ حفظ خيارات OpenAI",
    "Failed to save OpenAI options" : "فشل في حفظ خيارات OpenAI",
    "Prompt history cleared" : "السجل التاريخي للمحث تمّ محوه",
    "Failed to clear prompt history" : "تعذّر محو السجل التاريخي للمحث",
    "ChatGPT-like text generation" : "توليد نص مماثل لـ ChatGPT",
    "Preview" : "مُعاينة",
    "Preview content" : "معاينة المحتوى",
    "Show/hide advanced options" : "إظهار/إخفاء الخيارات المتقدمة",
    "Advanced options" : "الخيارات المتقدمة",
    "Preview text generation" : "معاينة توليد النص",
    "Submit generated text" : "إرسال النص المُولَّد",
    "Send" : "إرسال",
    "Include the prompt in the result" : "قم بتضمين المَحَثّ prompt في النتيجة",
    "How many results to generate" : "كم عدد النتائج الواجب توليدها",
    "Model to use" : "نموذج للاستخدام",
    "Approximate maximum number of words to generate (tokens)" : "أقصى عدد تقريبي للكلمات المراد إنشاؤها (رموز التحقق)",
    "What is the matter with putting pineapple on pizza?" : "ما العيب في وضع الأناناس على البيتزا؟",
    "Choose a model" : "إختَر نموذجاً",
    "Regenerate" : "أعِد التوليد",
    "by OpenAI" : "بواسطة OpenAI",
    "by LocalAI" : "باستخدام الذكاء الاصطناعي المستضاف محليّاً LocalAI",
    "Failed to save default model ID" : "تعذّر حفظ المُعرِّف التلقائي للنموذج default model ID",
    "Completion request error" : "خطأ في إكمال الطلب",
    "Unknown OpenAI API error" : "خطأ غير معروف فى واجهة برمجة تطبيقات OpenAI",
    "Prompt" : "المَحَثّ prompt",
    "Result" : "النتيجة",
    "Result {index}" : "النتيجة {index}",
    "AI image generation" : "توليد صور بال",
    "Preview images" : "معاينة الصِّوَر",
    "Submit the current preview" : "إرسال المعاينة الحالية",
    "Number of images to generate (1-10)" : "عدد الصور المراد توليدها (1-10)",
    "Size of the generated images" : "حجم الصور المولّدة",
    "cyberpunk pizza with pineapple, cats fighting with lightsabers" : "بيتزا سايبربانك مع الأناناس، القطط تتقاتل بالسيف الضوئي",
    "by OpenAI with DALL·E 2" : "بواسطة أداة DALL•E 2 من OpenAI ",
    "Unknown error" : "خطأ غير معروف",
    "API request error" : "خطأ في طلب الـ API",
    "Unknown image API error" : "خطأ غير محدد في واجهة استخدام API الصور",
    "AI speech-to-text" : "تحويل الكلام إلى نص بالذكاء الصناعي AI speech-to-text",
    "Transcribe" : "استكتاب Transcribe",
    "Translate (only to English)" : "الترجمة (فقط إلى الانجليزية) Translate",
    "Translate" : "ترجم",
    "by OpenAI with Whisper" : "بواسطة تطبيق Whisper من OpenAI ",
    "Failed to get transcription/translation" : "فشل في الحصول على الاستنساخ/الترجمة  transcription/translation",
    "Unknown API error" : "خطأ API غير محدّد"
},
"nplurals=6; plural=n==0 ? 0 : n==1 ? 1 : n==2 ? 2 : n%100>=3 && n%100<=10 ? 3 : n%100>=11 && n%100<=99 ? 4 : 5;");
