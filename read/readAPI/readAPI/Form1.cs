﻿using System;
using System.Net;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace readAPI
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        void searchHexString(int id)
        {
            WebClient client = new WebClient();
            string url = "http://localhost/API/returnHaxData.php?id=" + id; // API 網址
            string hexString = client.DownloadString(url).Replace("\t", "");

            if (hexString == "")
            {
                listBox1.Items.Add("無結果");
                return;
            }

            // 將 hex string 轉回 utf8 原文內容
            byte[] bytes = new byte[hexString.Length / 2];

            for (int i = 0; i < bytes.Length; i++)
            {
                bytes[i] = Convert.ToByte(hexString.Substring(i * 2, 2), 16);
            }
            string utf8 = Encoding.UTF8.GetString(bytes);


            // 顯示在 windows Application 上
            listBox1.Items.Add("id：" + id.ToString());
            listBox1.Items.Add("utf-8：" + utf8);
            listBox1.Items.Add("Hex：" + hexString);
        }

        private void submit_Click(object sender, EventArgs e)
        {
            try
            {
                listBox1.Items.Clear();
                int id = Convert.ToInt16(textBox1.Text); // 給一個 ID

                //輸入防呆
                if (id <= 0)
                {
                    listBox1.Items.Add("請輸入正整數");
                    return;
                }

                searchHexString(id);
            }
            catch (FormatException fex)
            {
                listBox1.Items.Add("請輸入正整數");
                listBox1.Items.Add(fex.Message);
            }
            catch (ArgumentOutOfRangeException aex)
            {
                listBox1.Items.Add("轉換過程出現錯誤");
                listBox1.Items.Add(aex.Message);
            }
            
        }

        private void button1_Click(object sender, EventArgs e)
        {
            WebClient client = new WebClient();
            Random rd = new Random();

            listBox1.Items.Clear();
            string url = "http://localhost/API/returnRandomID.php"; // API 網址
            string[] idArray = client.DownloadString(url).Replace("\t", "").Split(',');

            int id = Convert.ToInt32(idArray[rd.Next(0,idArray.Length-1)]);

            searchHexString(id);
        }
    }
}
