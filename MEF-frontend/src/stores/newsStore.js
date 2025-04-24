import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import { axiosClient } from '@/axios'

export const useNewsStore = defineStore('news', {
  state: () => ({
    activities: {
      data: [],
    },
    statements: [
      {
        id: 1,
        title: 'Myanmar Employers Fedration (MEF) ၏ ကြေငြာချက်(Statement)',
        committee: 'ဗဟိုအလုပ်အမှုဆောင်ကော်မီတီဝင်',
        statementNo: ' စာအမှတ် ။ ၀၀၂/၀၁/၂၅ ',
        body: '၁။။  စစ်အာဏာရှင်မင်းအောင်လှိုင် ဦးစီးသော စစ်ကောင်စီကို ဆန့်ကျင်ဖြုတ်ချရန် ၊ Myanma Nway Oo Employers Federation (MNEF) ကို ၂၀၂၃ ခုနှစ် နိုဝင်ဘာလ ၁ ရက်နေ့လွတ်မြောက်နယ်မြေတွင်စတင်ဖွဲ့စည်းခဲ့ပါသည်။ ၂၀၂၄ ခုနှစ် အောက်တိုဘာလ ၁၄ ရက်နေ့တွင် နွေဦးတော်လှန်ရေးအလွန်ကာလကိုမျှော်မှန်းပြီး MNEF အစား Myanmar Employers Federation (MEF)ဟုအမည်ပြောင်းလည်းဆောင်ရွက်ခဲ့ပါသည်။ ၂။။  မိဘပြည်သူများအားလုံးနှင့်လုပ်ငန်းရှင်များအားလုံးသည် Myanma Nway Oo Employers Federation (MNEF) Page အစား Myanmar Employers Federation (MEF) Page ကို ပြောင်းလဲကြည့်ရှု အကြံအဉာဏ်များ ပေးနိုင်ကြပါရန် လေးစားစွာ ကြေငြာတင်ပြအပ်ပါသည်ခင်ဗျား။',
        date: '14 Feb 2025',
        images: [
          '/assets/statement.jpeg',
          '/assets/statement.jpeg',
          '/assets/statement.jpeg',
          '/assets/statement.jpeg',
          '/assets/statement.jpeg',
          '/assets/statement.jpeg',
          '/assets/statement.jpeg',
        ],
        comments: [
          {
            id: 1,
            name: 'Tin Tun Oo',
            comment:
              'ILO အဆိုပါအရေးပေါ်အရေးယူမှုက ပုံမှန်ထက် ပိုမိုပြင်းထန်တဲ့ အချက်ပြတစ်ခုပါ။ မြန်မာနိုင်ငံလို စစ်အာဏာရှင် လက်ထက် ကူညီဖိနှိပ်ခံနေရတဲ့ အလုပ်သမားတွေ့အတွက် တရားမျှတမှုရဖို့ ဒီလိုနည်းလမ်းတွေလိုပါတယ်။',
            date: '2023-01-02',
          },
          {
            id: 2,
            name: 'Thiha',
            comment:
              'ILO Article 33 သုံးခြင်းက လုပ်သားအခွင့်အရေးဖိနှိပ်မှု အပေါ်တင်စားမှုတစ်ခုပါပဲ။ ဒီလိုနည်းလမ်းတွေက ဝိုင်းဝန်းကူညီရမယ့် အချိန်ပါ။',
            date: '2023-01-03',
          },
          {
            id: 3,
            name: 'Moe Aye',
            comment:
              'ILO အဆိုပါအရေးပေါ်အရေးယူမှုက ပုံမှန်ထက် ပိုမိုပြင်းထန်တဲ့ အချက်ပြတစ်ခုပါ။ မြန်မာနိုင်ငံလို စစ်အာဏာရှင် လက်ထက် ကူညီဖိနှိပ်ခံနေရတဲ့ အလုပ်သမားတွေ့အတွက် တရားမျှတမှုရဖို့ ဒီလိုနည်းလမ်းတွေလိုပါတယ်။',
            date: '2023-01-02',
          },
          {
            id: 4,
            name: 'Thiha',
            comment:
              'ILO Article 33 သုံးခြင်းက လုပ်သားအခွင့်အရေးဖိနှိပ်မှု အပေါ်တင်စားမှုတစ်ခုပါပဲ။ ဒီလိုနည်းလမ်းတွေက ဝိုင်းဝန်းကူညီရမယ့် အချိန်ပါ။',
            date: '2023-01-03',
          },
        ],
      },
      {
        id: 2,
        title: 'Myanmar Employers Fedration (MEF) ၏ ကြေငြာချက်(Statement)',
        statementNo: ' စာအမှတ် ။ ၃/၀၁/၂၅ ',
        committee: 'ဗဟိုအလုပ်အမှုဆောင်ကော်မီတီဝင်',
        body: '၁။။  စစ်အာဏာရှင်မင်းအောင်လှိုင် ဦးစီးသော စစ်ကောင်စီကို ဆန့်ကျင်ဖြုတ်ချရန် ၊ Myanma Nway Oo Employers Federation (MNEF) ကို ၂၀၂၃ ခုနှစ် နိုဝင်ဘာလ ၁ ရက်နေ့လွတ်မြောက်နယ်မြေတွင်စတင်ဖွဲ့စည်းခဲ့ပါသည်။ ၂၀၂၄ ခုနှစ် အောက်တိုဘာလ ၁၄ ရက်နေ့တွင် နွေဦးတော်လှန်ရေးအလွန်ကာလကိုမျှော်မှန်းပြီး MNEF အစား Myanmar Employers Federation (MEF)ဟုအမည်ပြောင်းလည်းဆောင်ရွက်ခဲ့ပါသည်။ ၂။။  မိဘပြည်သူများအားလုံးနှင့်လုပ်ငန်းရှင်များအားလုံးသည် Myanma Nway Oo Employers Federation (MNEF) Page အစား Myanmar Employers Federation (MEF) Page ကို ပြောင်းလဲကြည့်ရှု အကြံအဉာဏ်များ ပေးနိုင်ကြပါရန် လေးစားစွာ ကြေငြာတင်ပြအပ်ပါသည်ခင်ဗျား။',
        date: '14 Feb 2025',
        images: ['/assets/statement.jpeg', '/assets/statement.jpeg', '/assets/statement.jpeg'],
        comments: [
          {
            id: 1,
            name: 'Tin Tun Oo',
            comment:
              'ILO အဆိုပါအရေးပေါ်အရေးယူမှုက ပုံမှန်ထက် ပိုမိုပြင်းထန်တဲ့ အချက်ပြတစ်ခုပါ။ မြန်မာနိုင်ငံလို စစ်အာဏာရှင် လက်ထက် ကူညီဖိနှိပ်ခံနေရတဲ့ အလုပ်သမားတွေ့အတွက် တရားမျှတမှုရဖို့ ဒီလိုနည်းလမ်းတွေလိုပါတယ်။',
            date: '2023-01-02',
          },
          {
            id: 2,
            name: 'Thiha',
            comment:
              'ILO Article 33 သုံးခြင်းက လုပ်သားအခွင့်အရေးဖိနှိပ်မှု အပေါ်တင်စားမှုတစ်ခုပါပဲ။ ဒီလိုနည်းလမ်းတွေက ဝိုင်းဝန်းကူညီရမယ့် အချိန်ပါ။',
            date: '2023-01-03',
          },
          {
            id: 3,
            name: 'Moe Aye',
            comment:
              'ILO အဆိုပါအရေးပေါ်အရေးယူမှုက ပုံမှန်ထက် ပိုမိုပြင်းထန်တဲ့ အချက်ပြတစ်ခုပါ။ မြန်မာနိုင်ငံလို စစ်အာဏာရှင် လက်ထက် ကူညီဖိနှိပ်ခံနေရတဲ့ အလုပ်သမားတွေ့အတွက် တရားမျှတမှုရဖို့ ဒီလိုနည်းလမ်းတွေလိုပါတယ်။',
            date: '2023-01-02',
          },
          {
            id: 4,
            name: 'Thiha',
            comment:
              'ILO Article 33 သုံးခြင်းက လုပ်သားအခွင့်အရေးဖိနှိပ်မှု အပေါ်တင်စားမှုတစ်ခုပါပဲ။ ဒီလိုနည်းလမ်းတွေက ဝိုင်းဝန်းကူညီရမယ့် အချိန်ပါ။',
            date: '2023-01-03',
          },
        ],
      },
      {
        id: 3,
        title: 'Myanmar Employers Fedration (MEF) ၏ ကြေငြာချက်(Statement)',
        statementNo: ' စာအမှတ် ။ ၀၀၂/၀၁/၂၅ ',
        committee: 'ဗဟိုအလုပ်အမှုဆောင်ကော်မီတီဝင်',
        body: '၁။။  စစ်အာဏာရှင်မင်းအောင်လှိုင် ဦးစီးသော စစ်ကောင်စီကို ဆန့်ကျင်ဖြုတ်ချရန် ၊ Myanma Nway Oo Employers Federation (MNEF) ကို ၂၀၂၃ ခုနှစ် နိုဝင်ဘာလ ၁ ရက်နေ့လွတ်မြောက်နယ်မြေတွင်စတင်ဖွဲ့စည်းခဲ့ပါသည်။ ၂၀၂၄ ခုနှစ် အောက်တိုဘာလ ၁၄ ရက်နေ့တွင် နွေဦးတော်လှန်ရေးအလွန်ကာလကိုမျှော်မှန်းပြီး MNEF အစား Myanmar Employers Federation (MEF)ဟုအမည်ပြောင်းလည်းဆောင်ရွက်ခဲ့ပါသည်။ ၂။။  မိဘပြည်သူများအားလုံးနှင့်လုပ်ငန်းရှင်များအားလုံးသည် Myanma Nway Oo Employers Federation (MNEF) Page အစား Myanmar Employers Federation (MEF) Page ကို ပြောင်းလဲကြည့်ရှု အကြံအဉာဏ်များ ပေးနိုင်ကြပါရန် လေးစားစွာ ကြေငြာတင်ပြအပ်ပါသည်ခင်ဗျား။',
        date: '14 Feb 2025',
        images: ['/assets/statement.jpeg', '/assets/statement.jpeg', '/assets/statement.jpeg'],
        comments: [
          {
            id: 1,
            name: 'Tin Tun Oo',
            comment:
              'ILO အဆိုပါအရေးပေါ်အရေးယူမှုက ပုံမှန်ထက် ပိုမိုပြင်းထန်တဲ့ အချက်ပြတစ်ခုပါ။ မြန်မာနိုင်ငံလို စစ်အာဏာရှင် လက်ထက် ကူညီဖိနှိပ်ခံနေရတဲ့ အလုပ်သမားတွေ့အတွက် တရားမျှတမှုရဖို့ ဒီလိုနည်းလမ်းတွေလိုပါတယ်။',
            date: '2023-01-02',
          },
          {
            id: 2,
            name: 'Thiha',
            comment:
              'ILO Article 33 သုံးခြင်းက လုပ်သားအခွင့်အရေးဖိနှိပ်မှု အပေါ်တင်စားမှုတစ်ခုပါပဲ။ ဒီလိုနည်းလမ်းတွေက ဝိုင်းဝန်းကူညီရမယ့် အချိန်ပါ။',
            date: '2023-01-03',
          },
          {
            id: 3,
            name: 'Moe Aye',
            comment:
              'ILO အဆိုပါအရေးပေါ်အရေးယူမှုက ပုံမှန်ထက် ပိုမိုပြင်းထန်တဲ့ အချက်ပြတစ်ခုပါ။ မြန်မာနိုင်ငံလို စစ်အာဏာရှင် လက်ထက် ကူညီဖိနှိပ်ခံနေရတဲ့ အလုပ်သမားတွေ့အတွက် တရားမျှတမှုရဖို့ ဒီလိုနည်းလမ်းတွေလိုပါတယ်။',
            date: '2023-01-02',
          },
          {
            id: 4,
            name: 'Thiha',
            comment:
              'ILO Article 33 သုံးခြင်းက လုပ်သားအခွင့်အရေးဖိနှိပ်မှု အပေါ်တင်စားမှုတစ်ခုပါပဲ။ ဒီလိုနည်းလမ်းတွေက ဝိုင်းဝန်းကူညီရမယ့် အချိန်ပါ။',
            date: '2023-01-03',
          },
        ],
      },
      {
        id: 4,
        title: 'Myanmar Employers Fedration (MEF) ၏ ကြေငြာချက်(Statement)',
        statementNo: ' စာအမှတ် ။ ၀၀၂/၀၁/၂၅ ',
        committee: 'ဗဟိုအလုပ်အမှုဆောင်ကော်မီတီဝင်',
        body: '၁။။  စစ်အာဏာရှင်မင်းအောင်လှိုင် ဦးစီးသော စစ်ကောင်စီကို ဆန့်ကျင်ဖြုတ်ချရန် ၊ Myanma Nway Oo Employers Federation (MNEF) ကို ၂၀၂၃ ခုနှစ် နိုဝင်ဘာလ ၁ ရက်နေ့လွတ်မြောက်နယ်မြေတွင်စတင်ဖွဲ့စည်းခဲ့ပါသည်။ ၂၀၂၄ ခုနှစ် အောက်တိုဘာလ ၁၄ ရက်နေ့တွင် နွေဦးတော်လှန်ရေးအလွန်ကာလကိုမျှော်မှန်းပြီး MNEF အစား Myanmar Employers Federation (MEF)ဟုအမည်ပြောင်းလည်းဆောင်ရွက်ခဲ့ပါသည်။ ၂။။  မိဘပြည်သူများအားလုံးနှင့်လုပ်ငန်းရှင်များအားလုံးသည် Myanma Nway Oo Employers Federation (MNEF) Page အစား Myanmar Employers Federation (MEF) Page ကို ပြောင်းလဲကြည့်ရှု အကြံအဉာဏ်များ ပေးနိုင်ကြပါရန် လေးစားစွာ ကြေငြာတင်ပြအပ်ပါသည်ခင်ဗျား။',
        date: '14 Feb 2025',
        images: ['/assets/statement.jpeg', '/assets/statement.jpeg', '/assets/statement.jpeg'],
        comments: [
          {
            id: 1,
            name: 'Tin Tun Oo',
            comment:
              'ILO အဆိုပါအရေးပေါ်အရေးယူမှုက ပုံမှန်ထက် ပိုမိုပြင်းထန်တဲ့ အချက်ပြတစ်ခုပါ။ မြန်မာနိုင်ငံလို စစ်အာဏာရှင် လက်ထက် ကူညီဖိနှိပ်ခံနေရတဲ့ အလုပ်သမားတွေ့အတွက် တရားမျှတမှုရဖို့ ဒီလိုနည်းလမ်းတွေလိုပါတယ်။',
            date: '2023-01-02',
          },
          {
            id: 2,
            name: 'Thiha',
            comment:
              'ILO Article 33 သုံးခြင်းက လုပ်သားအခွင့်အရေးဖိနှိပ်မှု အပေါ်တင်စားမှုတစ်ခုပါပဲ။ ဒီလိုနည်းလမ်းတွေက ဝိုင်းဝန်းကူညီရမယ့် အချိန်ပါ။',
            date: '2023-01-03',
          },
          {
            id: 3,
            name: 'Moe Aye',
            comment:
              'ILO အဆိုပါအရေးပေါ်အရေးယူမှုက ပုံမှန်ထက် ပိုမိုပြင်းထန်တဲ့ အချက်ပြတစ်ခုပါ။ မြန်မာနိုင်ငံလို စစ်အာဏာရှင် လက်ထက် ကူညီဖိနှိပ်ခံနေရတဲ့ အလုပ်သမားတွေ့အတွက် တရားမျှတမှုရဖို့ ဒီလိုနည်းလမ်းတွေလိုပါတယ်။',
            date: '2023-01-02',
          },
          {
            id: 4,
            name: 'Thiha',
            comment:
              'ILO Article 33 သုံးခြင်းက လုပ်သားအခွင့်အရေးဖိနှိပ်မှု အပေါ်တင်စားမှုတစ်ခုပါပဲ။ ဒီလိုနည်းလမ်းတွေက ဝိုင်းဝန်းကူညီရမယ့် အချိန်ပါ။',
            date: '2023-01-03',
          },
        ],
      },
    ],
  }),
  actions: {
    async fetchPosts() {
      return axiosClient.get('/news').then((response) => {
        this.activities = response.data
        return response
      })
    },
    getPostById(postId) {
      return this.activities.data.find((post) => post.id === postId)
    },
    getStatementById(statementId) {
      return this.statements.find((statement) => statement.id === statementId)
    },
    async updatePost(postId, updatedPost) {
      const formData = new FormData()
      formData.append('_method', 'PATCH')
      Object.keys(updatedPost).forEach((key) => {
        if (key === 'imgFile' && updatedPost[key] instanceof File) {
          // Append the file directly
          formData.append(key, updatedPost[key])
        } else if (key !== 'image') {
          // Append other fields
          formData.append(key, updatedPost[key])
        }
      })

      return axiosClient.post(`/news/${postId}`, formData).then((response) => {
        if (response.status === 200) {
          const index = this.activities.data.findIndex((post) => post.id === postId)
          if (index !== -1) {
            this.activities.data[index] = { ...response.data }
          }
        }

        return response
      })
    },
    async createPost(newPost) {
      const formData = new FormData()

      Object.keys(newPost).forEach((key) => {
        if (key === 'imgFile' && newPost[key] instanceof File) {
          // Append the file directly
          formData.append(key, newPost[key])
        } else if (key !== 'image') {
          // Append other fields
          formData.append(key, newPost[key])
        }
      })

      return axiosClient.post('/news/', formData).then((response) => {
        console.log('response from newsStore', response)

        if (response.status === 201) {
          this.activities.data.push(response.data)
        }

        return response
      })
    },
    async deletePost(postId) {
      return axiosClient.delete(`/news/${postId}`).then((response) => {
        if (response.status === 200) {
          this.activities.data = this.activities.data.filter((post) => post.id !== postId)
        }

        return response
      })
    },
  },
})
