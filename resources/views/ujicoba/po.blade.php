<?php
$termin = $request->input('termin');
$jatuh_tempo = $request->input('jatuh_tempo');
$ket = $request->input('ket');

po_line::create(['hariini' => $tanggalHariIni]);
$pusinglo = Perusahaan::where('kode_perusahaan', $request->nama_perusahaan)->first();

if ($termin && $jatuh_tempo) {
    return redirect()
        ->back()
        ->with('error', 'Jatuh tempo harap tidak diisi dua-duanya');
} else {
    if (!$termin) {
        if (!$jatuh_tempo) {
            return redirect()
                ->back()
                ->with('error', 'Harap isi jatuh tempo');
        }
        if ($jatuh_tempo) {
            $gabung = Carbon::parse($request->input('tanggal_op'))
                ->addDays($jatuh_tempo)
                ->toDateString();
            Termin::create([
                'jatuh_tempo' => $jatuh_tempo,
                'ket' => $ket,
            ]);
        }
    }
}

$poline = po_line::latest()->first();
$purchaseOrder = PurchaseOrder::create([
    'id_po' => $poline->id_po,
    'user' => $username,
    'tanggal_po' => $request->tanggal_po,
    'nama_perusahaan' => $pusinglo->nama_perusahaan,
    'detail_po' => $poline->id_detailpo,
]);
if (isset($selectedItemsArrayArray['discount'])) {
    if ($purchaseOrder) {
        // Update stock and create detail PO for each selected item
        if (is_array($selectedItemsArrayArray)) {
            foreach ($selectedItemsArrayArray as $selectedItem) {
                // $manggil = Barang::where('barang_id', $selectedItem['barang_id'])->first();
                // $kurang = $manggil->stok - $selectedItem['quantity'];
                $total = $selectedItem['quantity'] * $selectedItem['price'] * ($selectedItem['discount'] / 100);
                detail_po::create([
                    'id_detail_po' => $poline->id_detailpo,
                    'id_po' => $poline->id_po,
                    'barang_id' => $selectedItem['barang_id'],
                    'nama_barang' => $selectedItem['nama_barang'],
                    'satuan' => $selectedItem['satuan'],
                    'stok' => $selectedItem['quantity'],
                    'harga' => $selectedItem['price'],
                    'potongan' => $selectedItem['discount'],
                    'total_harga' => $total,
                ]);
                // Barang::where('barang_id', $selectedItem['barang_id'])->update(['stok' => $kurang]);
            }
        } else {
            // $manggil = Barang::where('barang_id', $selectedItemsArrayArray["barang_id"])->first();
            // // dd($manggil);
            // $kurang = $manggil->stok - $selectedItemsArrayArray['quantity'];
            dd($selectedItemsArrayArray);
            $total = $selectedItemsArrayArray['quantity'] * $selectedItemsArrayArray['price'] * (1 - $selectedItemsArrayArray['discount'] / 100);
            detail_po::create([
                'id_detail_po' => $poline->id_detailpo,
                'id_po' => $poline->id_po,
                'barang_id' => $selectedItemsArrayArray['barang_id'],
                'nama_barang' => $selectedItemsArrayArray['nama_barang'],
                'satuan' => $selectedItemsArrayArray['satuan'],
                'stok' => $selectedItemsArrayArray['quantity'],
                'harga' => $selectedItemsArrayArray['price'],
                'potongan' => $selectedItemsArrayArray['discount'],
                'total' => $total,
            ]);
            // Barang::where('barang_id', $selectedItemsArrayArray['barang_id'])->update(['stok' => $kurang]);
        }
    }
} else {
    if ($purchaseOrder) {
        // Update stock and create detail PO for each selected item
        if (is_array($selectedItemsArrayArray)) {
            foreach ($selectedItemsArrayArray as $selectedItem) {
                // $manggil = Barang::where('barang_id', $selectedItem['barang_id'])->first();
                // $kurang = $manggil->stok - $selectedItem['quantity'];
                $total = $selectedItem['quantity'] * $selectedItem['price'];
                detail_po::create([
                    'id_detail_po' => $poline->id_detailpo,
                    'id_po' => $poline->id_po,
                    'barang_id' => $selectedItem['barang_id'],
                    'nama_barang' => $selectedItem['nama_barang'],
                    'satuan' => $selectedItem['satuan'],
                    'stok' => $selectedItem['quantity'],
                    'harga' => $selectedItem['price'],
                    'potongan' => 0,
                    'total_harga' => $total,
                ]);
                // Barang::where('barang_id', $selectedItem['barang_id'])->update(['stok' => $kurang]);
            }
        } else {
            // $manggil = Barang::where('barang_id', $selectedItemsArrayArray["barang_id"])->first();
            // // dd($manggil);
            // $kurang = $manggil->stok - $selectedItemsArrayArray['quantity'];
            dd($selectedItemsArrayArray);
            $total = $selectedItemsArrayArray['quantity'] * $selectedItemsArrayArray['price'];
            detail_po::create([
                'id_detail_po' => $poline->id_detailpo,
                'id_po' => $poline->id_po,
                'barang_id' => $selectedItemsArrayArray['barang_id'],
                'nama_barang' => $selectedItemsArrayArray['nama_barang'],
                'satuan' => $selectedItemsArrayArray['satuan'],
                'stok' => $selectedItemsArrayArray['quantity'],
                'harga' => $selectedItemsArrayArray['price'],
                'potongan' => 0,
                'total' => $total,
            ]);
            // Barang::where('barang_id', $selectedItemsArrayArray['barang_id'])->update(['stok' => $kurang]);
        }
    }
}
?>
