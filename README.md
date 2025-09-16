# 💰 Expense Tracker (Daromad / Chiqim kuzatuvchi tizim)

Laravel asosida yaratilgan oddiy **daromad va chiqimlarni boshqarish ilovasi**.  
Foydalanuvchilar o‘z xarajat va daromadlarini kiritishi, kategoriyalar bo‘yicha ko‘rishi va grafiklarda tahlil qilishi mumkin.

---

## 🚀 Funksiyalar
- 🔐 Auth (login / ro‘yxatdan o‘tish)
- ➕ Transaction (daromad/chiqim) qo‘shish, tahrirlash va o‘chirish
- 📊 Umumiy balans, daromad va chiqimlarni ko‘rish
- 🔎 Qidiruv / Filtrlash imkoniyati
- 📈 Statistika (oylik daromad/chiqim grafigi va kategoriyalar bo‘yicha chiqim aylana diagrammasi)
- ⬇️ Transactionlarni **Excel yoki CSV** fayl sifatida yuklab olish
- 🎨 Zamonaviy qora-kok tematik UI (Bootstrap 5 + custom CSS)

---

## 🛠 Texnologiyalar
- **Backend:** Laravel 11, PHP 8.3
- **Database:** MySQL
- **Frontend:** Blade, Bootstrap 5, Chart.js
- **Export:** maatwebsite/excel

---

## ⚙️ O‘rnatish

1. Loyihani clone qiling:
   ```bash
   git clone https://github.com/USERNAME/expense-tracker.git
   cd expense-tracker
composer install
npm install && npm run dev

## .env faylini sozlang:
cp .env.example .env
php artisan key:generate

## Ma’lumotlar bazasini yaratib, migratsiyalarni ishga tushiring:

php artisan migrate

## Serverni ishga tushiring:

php artisan serve

<img width="1901" height="893" alt="image" src="https://github.com/user-attachments/assets/4d923b3b-c39a-48db-8847-722a7da51bc9" />
<img width="1920" height="921" alt="image" src="https://github.com/user-attachments/assets/4b81390b-0cbe-4e68-b9cf-5d8db8b68bfa" />

