<?php /* Expects $registeredUsers. Optional: $usersSub, $showJoined */ ?>
<section class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
  <div class="flex items-center justify-between gap-4 px-6 py-5">
    <div>
      <h2 class="text-lg font-extrabold text-navy">User Management</h2>
      <p class="text-xs text-slate-500 mt-0.5"><?= $usersSub ?? '48 registered users · 4 recent accounts' ?></p>
    </div>
    <button onclick="handleAddUser()" class="btn-amber flex items-center gap-2 px-5 py-2.5 rounded-lg text-sm font-bold shrink-0">
      <iconify-icon icon="lucide:plus" width="16"></iconify-icon> Add User
    </button>
  </div>
  <div class="overflow-x-auto">
    <table class="w-full text-left text-sm min-w-[640px]">
      <thead class="bg-[#f4f6fa] text-[11px] uppercase tracking-wide text-slate-500 font-semibold">
        <tr>
          <th class="px-6 py-3">User Name</th><th class="px-6 py-3">Email</th><th class="px-6 py-3">Role</th>
          <th class="px-6 py-3">Status</th><?php if (!empty($showJoined)): ?><th class="px-6 py-3">Registered</th><?php endif; ?><th class="px-6 py-3">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($registeredUsers as $u): ?>
        <tr class="border-t border-slate-200">
          <td class="px-6 py-4"><div class="flex items-center gap-3">
            <span class="w-8 h-8 rounded-full bg-slate-100 text-[10px] font-bold text-navy flex items-center justify-center"><?= initials($u['name']) ?></span>
            <span class="font-bold text-navy"><?= e($u['name']) ?></span></div></td>
          <td class="px-6 py-4 text-navy"><?= e($u['email']) ?></td>
          <td class="px-6 py-4 text-navy"><?= e($u['role']) ?></td>
          <td class="px-6 py-4"><?= pill($u['status']) ?></td>
          <?php if (!empty($showJoined)): ?><td class="px-6 py-4 text-slate-500 text-xs"><?= e($u['joined']) ?></td><?php endif; ?>
          <td class="px-6 py-4"><div class="flex items-center gap-3">
            <a href="#" class="text-xs font-bold text-navy underline">Edit</a>
            <button class="text-slate-500" aria-label="More"><iconify-icon icon="lucide:more-horizontal" width="16"></iconify-icon></button></div></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>
